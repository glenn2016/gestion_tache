@include('employe.empmenu')


<!-- Header End -->
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="card-title fw-semibold mb-4">Tâches à faire</h5>

                    @if ($taches->isEmpty())
                        <p>Aucune tâche à faire pour le moment.</p>
                    @else
                        @foreach ($taches as $tache)
                            @if ($tache->etat == 1)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">{{ $tache->description }}</p>
                                            <a href="#" class="card-link">Date fin</a>
                                            <a href="#" class="card-link">{{ $tache->date_fin }}</a>
                                            
                                        </div>
                                        <form method="post" action="{{ route('update.tache', ['id' => $tache->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary m-1">Faire</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header End -->
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="card-title fw-semibold mb-4">Tache finaliser</h5>

                    @if ($taches->isEmpty())
                        <p>Aucune tâche finalisée pour le moment.</p>
                    @else
                        @foreach ($taches as $tache)
                            @if ($tache->etat == 2)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">{{ $tache->description }}</p>
                                            <a href="#" class="card-link">Date fin</a>
                                            <a href="#" class="card-link">{{ $tache->date_fin }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif

                    

                </div>
            </div>
        </div>
    </div>
</div>

@include('employe.empmenuf') 