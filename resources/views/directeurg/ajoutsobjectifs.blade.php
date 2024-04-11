@include('directeurg.resmenu')

  <div class="container-fluid">
      <div class="card">
          <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">AJout d'un ojectif</h5>
          <p class="mb-0">!!! </p>
      </div>
      <div class="card">
                <div class="card-body">
                  <form method="post" action="/ajoutsobjectifss">
                    @csrf

                    <div class="mb-3">
                      <label for="nom_objectifs" class="form-label">Non objectifs</label>
                      <input type="text" name="nom_objectifs" class="form-control" id="nom_objectifs" aria-describedby="nom_objectifs">
                    </div> 

                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <textarea class="form-control" name="description" id="description"></textarea>
                    </div>

                    <div class="mb-3">
                      <label for="date_fin" class="form-label">Date fin</label>
                      <input type="date" class="form-control" name="date_fin" id="date_fin" aria-describedby="date_fin">
                    </div>

                    <div class="mb-3">
                      <label for="user_id" class="form-label">Responsable</label>
                      <select class="form-select" name="user_id" id="user_id">
                      <option >faites un choix</option>
                        @foreach($responsableUsers as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                      </select>
                    </div>
                      <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>
    </div>
  </div>  
@include('directeurg.resmenuf') 