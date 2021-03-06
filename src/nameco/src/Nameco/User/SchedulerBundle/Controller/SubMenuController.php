<?php

namespace Nameco\User\SchedulerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * サブメニューコントローラ
 * @author yu-ito
 */
class SubMenuController extends Controller
{
    /**
     * 月表示ユーザ選択
     * @Route("/schedule/submenu/month")
     * @Template()
     */
    public function scheduleMonthAction(Request $request, $year, $month)
    {
        $users = $this->getDoctrine()->getRepository('NamecoUserSchedulerBundle:User')->findAll();
        return array('users' => $users, 'year' => $year, 'month' => $month);
    }

    /**
     * @Route("/establishment/submenu/month")
     * @Template()
     */
    public function establishmentMonthAction(Request $request, $year = null, $month = null)
    {
        $areas = $this->getDoctrine()
        ->getRepository('NamecoUserSchedulerBundle:Area')
        ->createQueryBuilder('es')
        ->orderBy('es.name', 'ASC')
        ->getQuery()
        ->getResult();

        return array('areas' => $areas, 'year' => $year, 'month' => $month);
    }
}
