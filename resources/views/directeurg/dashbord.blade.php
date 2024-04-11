@include('directeurg.resmenu')

<div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Sales Overview</h5>
                    </div>
                    <div>
                    </div>
                </div>
                <canvas id="myChart" width="400" height="400"></canvas>
                </div>
            </div>
            </div>
        <div class="col-lg-4">
            <div class="row">
            <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Yearly Breakup</h5>
                    <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="fw-semibold mb-3">$36,358</h4>
                        <div class="d-flex align-items-center mb-3">
                        <span
                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                        </span>
                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                        <p class="fs-3 mb-0">last year</p>
                        </div>
                        <div class="d-flex align-items-center">
                        <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                        </div>
                        <div>
                            <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                        </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <canvas id="myChart" width="100" height="100"></canvas>

                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-12">
                <!-- Monthly Earnings -->
                <div class="card">
                <div class="card-body">
                    <div class="row alig n-items-start">
                    <div class="col-8">
                        <h5 class="card-title mb-9 fw-semibold"> Monthly Earnings </h5>
                        <h4 class="fw-semibold mb-3">$6,820</h4>
                        <div class="d-flex align-items-center pb-1">
                        <span
                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-down-right text-danger"></i>
                        </span>
                        <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                        <p class="fs-3 mb-0">last year</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-end">
                        <div
                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-currency-dollar fs-6"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div id="earning"></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var enCours = {!! json_encode($tachesPasFaites) !!};
    var termines = {!! json_encode($tachesFaites) !!};


    var totalProjets = enCours.length + termines.length;


    var pourcentageEnCours = (enCours.length / totalProjets) * 100;
    var pourcentageTermines = (termines.length / totalProjets) * 100;

    var data = {
        labels: ['Pas faites', 'faites'],
        datasets: [{
            label: 'Pourcentage de projets',
            data: [pourcentageEnCours, pourcentageTermines],
            backgroundColor: ['rgb(54, 162, 235)', 'rgb(75, 192, 192)'],
        }]
    };
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie', // Utiliser le type 'pie' pour le diagramme circulaire
        data: data,
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                },
                // Pour afficher les pourcentages dans les tooltips
                tooltips: {
                    callbacks: {
                        label: function (context) {
                            var label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += context.formattedValue + '%'; // Ajouter le symbole de pourcentage
                            return label;
                        }
                    }
                }
            }
        }
    });
</script>

@include('directeurg.resmenuf') 