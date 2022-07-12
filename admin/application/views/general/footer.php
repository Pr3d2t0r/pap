                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ON MARKET 2022</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?php echo base_url("resources/vendor/jquery/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("resources/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>

    <script src="<?php echo base_url("resources/vendor/jquery-easing/jquery.easing.min.js"); ?>"></script>

    <script src="<?php echo base_url("resources/js/sb-admin-2.min.js"); ?>"></script>
    <?php if($page == "Home"): ?>
        <script src="<?php echo base_url("resources/vendor/chart.js/Chart.min.js"); ?>"></script>
        <script src="<?php echo base_url("resources/js/helpers/chart-area-helper.js"); ?>"></script>
        <script>
            $.getJSON("<?php echo str_replace("admin/", "", base_url("api/order/month")); ?>", (xdata)=>{
                var ctx = document.getElementById("earnings-chart");
                var myLineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["jan", "fev", "mar", "abr", "maio", "jun", "jul", "ago", "set", "out", "nov", "dez"],
                        datasets: [{
                            label: "Ganhos",
                            lineTension: 0.3,
                            backgroundColor: "rgba(78, 115, 223, 0.05)",
                            borderColor: "rgba(78, 115, 223, 1)",
                            pointRadius: 3,
                            pointBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointBorderColor: "rgba(78, 115, 223, 1)",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: xdata,
                        }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        layout: {
                            padding: {
                                left: 10,
                                right: 25,
                                top: 25,
                                bottom: 0
                            }
                        },
                        scales: {
                            xAxes: [{
                                time: {
                                    unit: 'date'
                                },
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                },
                                ticks: {
                                    maxTicksLimit: 7
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    maxTicksLimit: 5,
                                    padding: 10,
                                    // Include a dollar sign in the ticks
                                    callback: function(value, index, values) {
                                        return number_format(value) + "€";
                                    }
                                },
                                gridLines: {
                                    color: "rgb(234, 236, 244)",
                                    zeroLineColor: "rgb(234, 236, 244)",
                                    drawBorder: false,
                                    borderDash: [2],
                                    zeroLineBorderDash: [2]
                                }
                            }],
                        },
                        legend: {
                            display: false
                        },
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            titleMarginBottom: 10,
                            titleFontColor: '#6e707e',
                            titleFontSize: 14,
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            intersect: false,
                            mode: 'index',
                            caretPadding: 10,
                            callbacks: {
                                label: function(tooltipItem, chart) {
                                    return 'Ganhos: ' + number_format(tooltipItem.yLabel) + "€";
                                }
                            }
                        }
                    }
                });
            });
        </script>
    <?php elseif($page == "Product"): ?>
        <script src="<?php echo base_url("resources/vendor/datatables/jquery.dataTables.min.js") ?>"></script>
        <script src="<?php echo base_url("resources/vendor/datatables/dataTables.bootstrap4.min.js") ?>"></script>

        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    "language": {
                        "paginate": {
                            "next": "Proxima",
                            "previous": "Anterior",
                        },
                        "emptyTable": "Não existem itens",
                        "info": "Pagina _PAGE_ de _PAGES_",
                        "sInfoEmpty": "Pagina 0 de 0",
                        "sInfoFiltered": "(filtrado de _MAX_ itens)",
                        "sLengthMenu": "Mostrar _MENU_ itens",
                        "sSearch": "Pesquisa:"
                    }
                });
            });
            $("#clearDiscount").on("click", evt=>{
                $("input[name='discount_id']").prop('checked', false);
                evt.preventDefault();
            })
        </script>
    <?php endif; ?>

</body>

</html>