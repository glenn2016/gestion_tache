@include('directeurg.resmenu')

  <div class="container-fluid">
      <div class="card">
          <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">AJout d'un responsable</h5>
          <p class="mb-0">!!! </p>
      </div>
      <div class="card">
                <div class="card-body">

                <form method="post"action="{{url('/ajoutresponsables')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Nom</label>
                      <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
                    </div>

                    <div class="mb-3">
                      <label for="prenom" class="form-label">Prenom</label>
                      <input type="text" name="prenom" class="form-control" id="prenom" aria-describedby="prenom">
                    </div>

                    <div class="mb-3">
                      <label for="adresse" class="form-label">Addresse</label>
                      <input type="text"name="adresse" class="form-control" id="adresse" aria-describedby="adresse">
                    </div>

                    <div class="mb-3">
                      <label for="numero_telephone" class="form-label">Numéro de téléphone</label>
                      <input type="text"name="numero_telephone" class="form-control" id="numero_telephone" aria-describedby="numero_telephone">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Adresse emaill</label>
                      <input type="email"name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1"  class="form-label">Password</label>
                      <input type="password"name="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <label for="profil" class="form-label">Profil</label>
                        <select name="profile" class="form-select" id="profil">
                            <option value="">Sélectionnez un profil</option>
                            @foreach($profiles as $profile)
                                <option value="{{ $profile->id }}">{{ $profile->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    
                  </form>
              </div>
    </div>
  </div>  
@include('directeurg.resmenuf') 