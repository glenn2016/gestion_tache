
@include('directeurg.resmenu')


   <!--  Header End -->
   <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="row">
              <h5 class="card-title fw-semibold mb-4">Listes responsable</h5>

              @foreach($users as $user)

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text"></p>
                                <a href="#" class="card-link">Nom :</a>
                                <a href="#" class="card-link">{{$user->name}}</a>
                                <br>

                                <a href="#" class="card-link">Prenom :</a>
                                <a href="#" class="card-link">{{$user->prenom}}</a>
                                <br>

                                <a href="#" class="card-link">Email :</a>
                                <a href="#" class="card-link">{{$user->email}}</a>

                                <br>

                                <a href="#" class="card-link">Numero de telephone :</a>
                                <a href="#" class="card-link">{{$user->numero_telephone}}</a>

                                <br>
                                <br>

                                <button type="button" class="btn btn-danger m-1">Supprimer</button>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>

@include('directeurg.resmenuf') 