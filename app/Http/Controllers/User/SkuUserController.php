<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SKU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkuUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = SKU::where('users_id', Auth::user()->id)->get();

            return datatables()->of($query)
                ->editColumn('created_at', function ($item) {
                    return $item->created_at->format('d F Y');
                })
                ->addColumn('action', function ($item) {
                    if ($item->status_proses == 'Waiting') {
                        return '
                            <div class="action d-flex">
                                <a href="javascript:void(0)" class="btn btn-pill btn-outline-danger btn-sm disabled">' . $item->status_proses . '</a>
                                <a href="javascript:void(0)" class="btn btn-pill btn-warning btn-sm ms-3" onClick="updateSubmission(' . $item->id . ')">Update</a>
                            </div>
                        ';
                    } elseif ($item->status_proses == 'In Review') {
                        return '
                            <div class="action">
                                <a href="javascript:void(0)" class="btn btn-pill btn-warning btn-sm disabled">' . $item->status_proses . '</a>
                            </div>
                        ';
                    } elseif ($item->status_submission == 'Conflicted') {
                        return '
                            <div class="action">
                                <a href="javascript:void(0)" class="btn btn-pill btn-danger btn-sm" onClick="seeAccepted(' . $item->id . ')">Conflicted</a>
                            </div>
                        ';
                    } elseif ($item->status_proses == 'Rejected') {
                        return '
                            <div class="action">
                                <a href="javascript:void(0)" class="btn btn-pill btn-danger btn-sm" onClick="seeRejected(' . $item->id . ')">Rejected</a>
                            </div>
                        ';
                    } elseif ($item->status_proses == 'Accepted') {
                        return '
                            <div class="action">
                            <a href="javascript:void(0)" class="btn btn-pill btn-success btn-sm mb-2" onClick="seeAccepted(' . $item->id . ')">Abstract Accepted</a>
                            </div>
                        ';
                    }
                })

                ->rawColumns(['created_at', 'action'])
                ->make(true);
        }
        return view('pages.user.sku.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
