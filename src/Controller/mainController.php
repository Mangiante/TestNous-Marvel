<?php
namespace App\Controller;

use App\Entity\Power;
use App\Repository\HeroRepository;
use App\Repository\TeamRepository;
use App\Repository\PowerRepository;
use App\Repository\HeroPowerRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class mainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(TeamRepository $teamRepository,HeroRepository $heroRepository): Response
    {
        $teams = $teamRepository->findAll();
        $heros = $heroRepository->findAll();
        return $this->render('teams.html.twig', [
            'teams' => $teams,
            'heros' => $heros,
        ]);
    }

        /**
     * @Route("/hero/{id}", name="hero")
     */
    public function show(HeroPowerRepository $heroPowerRepository, PowerRepository $powerRepository, TeamRepository $teamRepository, HeroRepository $heroRepository, $id): Response
    {
        // Récupération des pouvoirs du héro sélectionné
        $powers = $heroPowerRepository->findAll();
        $powers_hero = array();
        foreach($powers as $power){
            if($power->getHeroId() == $id){
                $power = $powerRepository->find($power->getPowerId());
                array_push($powers_hero,$power);
            }
        }

        // Récupération de la team du héro sélectionné
        $hero = $heroRepository->find($id);
        $team = $teamRepository->find($hero->getTeam());

        return $this->render('hero.html.twig', [
            'powers' => $powers_hero,
            'team' => $team,
            'hero' => $heroRepository->find($id),
        ]);
    }
}