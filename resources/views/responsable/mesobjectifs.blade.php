@include('responsable.menu')
<div class="container-fluid">
    <div class="card">
        <div class="row">   
            @if($objectifs->isEmpty())
            <p>Aucun objectif disponible pour le moment.</p>
        @else
            @foreach($objectifs as $objectif)
                <div class="col-sm-6 col-xl-3">
                    <div class="card overflow-hidden rounded-2">
                        <div class="position-relative">
                            <a href="{{ route('objectif.taches', ['id' => $objectif->id]) }}"><img src="../assets/images/products/target-2579315_1280.jpg" class="card-img-top rounded-0" alt="..."></a>
                            <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                        </div>
                        <div class="card-body pt-3 p-4">
                            <h6 class="fw-semibold fs-4">{{ $objectif->nom_objectifs}}</h6>
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="fw-semibold fs-4 mb-0">{{ $objectif->date_fin }} <span class="ms-2 fw-normal text-muted fs-3"></span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                
            @endforeach
        @endif
        
        </div>  
    </div>
</div>
@include('responsable.menuf')