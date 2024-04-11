@include('directeurg.resmenu')
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="row">

              <h5 class="card-title fw-semibold mb-4">Tâches à faire</h5>

              @foreach ($taches as $tache)


                @if ($tache->etat == 1)
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

            </div>
          </div>
        </div>
      </div>
       <!--  Header End -->
       <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="row">
              <h5 class="card-title fw-semibold mb-4">Tache finaliser</h5>

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

              </div>
            </div>
          </div>
        </div>
      </div>  
@include('directeurg.resmenuf')
