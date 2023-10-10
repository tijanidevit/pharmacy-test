<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Services\ModeratorService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Moderator\AddModeratorRequest;

class ModeratorController extends Controller
{
    public function __construct(protected ModeratorService $moderatorService) {}

    public function index() : View
    {
        $moderators = $this->moderatorService->getAllModerators();
        return view('admin.moderators.index', compact('moderators'));
    }

    public function create() : View
    {
        return view('admin.moderators.create');
    }

    public function store(AddModeratorRequest $request): RedirectResponse
    {
        $this->moderatorService->addModerator($request->validated());
        return to_route('moderator.index')->with('success', 'Moderator added successfully!');
    }

    public function destroy(User $user)
    {
        $this->moderatorService->deleteModerator($user);
        return to_route('moderator.index')->with('success', 'Moderator deleted successfully!');
    }
}
