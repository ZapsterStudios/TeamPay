<?php

namespace ZapsterStudios\Ally\Controllers\Dashboard;

use App\Team;
use Illuminate\Http\Request;
use ZapsterStudios\Ally\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of teams.
     *
     * @return Response
     */
    public function index()
    {
        return response()->json(Team::paginate(30));
    }

    /**
     * Display a single team.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return response()->json(Team::findOrFail($id));
    }

    /**
     * Search for a list of teams.
     *
     * @param  Request  $request
     * @return Response
     */
    public function search(Request $request)
    {
        $search = $request->search;

        return response()->json(Team::where('id', $search)
            ->orWhere('user_id', $search)
            ->orWhere('name', 'LIKE', '%'.$search.'%')
            ->orWhere('slug', 'LIKE', '%'.$search.'%')
            ->paginate(30)
        );
    }
}
