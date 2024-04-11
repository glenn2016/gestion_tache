@include('responsable.menu')
  <div class="container-fluid">
      <div class="card">
          <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">AJout d'une tache</h5>
          <p class="mb-0">!!! </p>
      </div>
      <div class="card">
                <div class="card-body">
                <form method="post" action="/ajouttachess">
                    @csrf

                    <div class="mb-3">
                      <label for="objectif_id" class="form-label">Objectifs</label>
                      <select class="form-select" name="objectif_id" id="objectif_id">
                      <option >faites un choix</option>
                        @foreach($objectifs as $objectif)
                          <option value="{{ $objectif->id }}">{{ $objectif->nom_objectifs}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="user_id" class="form-label">assigner a</label>
                      <select class="form-select" name="user_id" id="user_id">
                      <option >faites un choix</option>
                        @foreach($responsableUsers as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}&nbsp{{ $user->prenom }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <textarea class="form-control" name="description" id="description"></textarea>
                    </div>

                    <div class="mb-3">
                      <label for="date_fin" class="form-label">Date fin</label>
                      <input type="date" class="form-control" name="date_fin" id="date_fin" aria-describedby="date_fin">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>
    </div>
  </div>  
  @include('responsable.menuf')