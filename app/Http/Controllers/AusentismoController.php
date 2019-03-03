<?php

namespace App\Http\Controllers;

use App\DataTables\AusentismoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAusentismoRequest;
use App\Http\Requests\UpdateAusentismoRequest;
use App\Repositories\AusentismoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AusentismoController extends AppBaseController
{
    /** @var  AusentismoRepository */
    private $ausentismoRepository;

    public function __construct(AusentismoRepository $ausentismoRepo)
    {
        $this->ausentismoRepository = $ausentismoRepo;
    }

    /**
     * Display a listing of the Ausentismo.
     *
     * @param AusentismoDataTable $ausentismoDataTable
     * @return Response
     */
    public function index(AusentismoDataTable $ausentismoDataTable)
    {
        return $ausentismoDataTable->render('ausentismos.index');
    }

    /**
     * Show the form for creating a new Ausentismo.
     *
     * @return Response
     */
    public function create()
    {
        return view('ausentismos.create');
    }

    /**
     * Store a newly created Ausentismo in storage.
     *
     * @param CreateAusentismoRequest $request
     *
     * @return Response
     */
    public function store(CreateAusentismoRequest $request)
    {
        $input = $request->all();

        $ausentismo = $this->ausentismoRepository->create($input);

        Flash::success('Ausentismo saved successfully.');

        return redirect(route('ausentismos.index'));
    }

    /**
     * Display the specified Ausentismo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ausentismo = $this->ausentismoRepository->findWithoutFail($id);

        if (empty($ausentismo)) {
            Flash::error('Ausentismo not found');

            return redirect(route('ausentismos.index'));
        }

        return view('ausentismos.show')->with('ausentismo', $ausentismo);
    }

    /**
     * Show the form for editing the specified Ausentismo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ausentismo = $this->ausentismoRepository->findWithoutFail($id);

        if (empty($ausentismo)) {
            Flash::error('Ausentismo not found');

            return redirect(route('ausentismos.index'));
        }

        return view('ausentismos.edit')->with('ausentismo', $ausentismo);
    }

    /**
     * Update the specified Ausentismo in storage.
     *
     * @param  int              $id
     * @param UpdateAusentismoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAusentismoRequest $request)
    {
        $ausentismo = $this->ausentismoRepository->findWithoutFail($id);

        if (empty($ausentismo)) {
            Flash::error('Ausentismo not found');

            return redirect(route('ausentismos.index'));
        }

        $ausentismo = $this->ausentismoRepository->update($request->all(), $id);

        Flash::success('Ausentismo updated successfully.');

        return redirect(route('ausentismos.index'));
    }

    /**
     * Remove the specified Ausentismo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ausentismo = $this->ausentismoRepository->findWithoutFail($id);

        if (empty($ausentismo)) {
            Flash::error('Ausentismo not found');

            return redirect(route('ausentismos.index'));
        }

        $this->ausentismoRepository->delete($id);

        Flash::success('Ausentismo deleted successfully.');

        return redirect(route('ausentismos.index'));
    }
}
