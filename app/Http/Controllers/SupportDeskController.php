<?php

namespace ActivismeBE\Http\Controllers;

use Illuminate\Http\Request;
use ActivismeBE\Repositories\{
    SupportDeskRepository, PriorityRepository, CategoryRepository, StatusRepository
};

/**
 * Class SupportDeskController 
 * 
 * @author  Tim Joosten 
 * @license MIT License
 * @package ActivismeBE\Http\Controllers
 */
class SupportDeskController extends Controller
{
    private $supportDesk; /** @var SupportDeskRepository $supportDesk */
    private $priorities;  /** @var PriorityRepository    $priorities  */
    private $categories;  /** @var CategoryRepository    $categories  */
    private $statusses;   /** @var StatusRepository      $statusses   */

    /**
     * SupportDeskController constructor
     *
     * @param  SupportDeskRepository $supportDesk The abstraction layer for the support tickets DB table.
     * @param  PriorityRepository    $priorities  The abstraction layer for the support ticket priorities.
     * @param  CategoryRepository    $categories  The abstraction layer for the support ticket categories.  
     * @param  StatusRepository      $statusses   The abstraction layer for the support ticket Statusses.
     * @return void
     */
    public function __construct(
        SupportDeskRepository   $supportDesk, 
        PriorityRepository      $priorities, //! Repository NOT created.
        CategoryRepository      $categories, //! Repository NOT created.
        StatusRepository        $statusses   //! Repository NOT created.
    ) {
        //! $this->middleware('auth');               // TODO: Implement and register middleware
        //! $this->middleware('forbid-banned-user'); // TODO: Implement and register middleware

        $this->supportDesk = $supportDesk;
        $this->piorities   = $priorities; 
        $this->categories  = $categories; 
        $this->statusses   = $statusses;
    }

    /**
     * Get the support-desk dashboard. 
     *
     * @return View
     */
    public function index(): View
    {
        return view('support-desk.index', [
            'tickets'    => $this->supportDesk->baseEntity(),
            'priorities' => $this->priorities->baseEntity(),
            'categories' => $this->categories->baseEntity(),
        ]); 
    }
}