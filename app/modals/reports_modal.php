<!-- Orders PDF Modal -->
<div class="modal fade modal-add-contact" id="get_orders_pdf_report" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data" action="backoffice_generate_reports?type=PDF&module=Orders">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Filter Orders Using Dates</h5>
                </div>

                <div class="modal-body px-4">
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="firstName">Orders From Date</label>
                                <input type="date" required class="form-control" name="start_date">
                            </div>
                        </div>
                        <div class=" col-lg-6">
                            <div class="form-group">
                                <label for="firstName">Orders To Date</label>
                                <input type="date" required class="form-control" name="end_date">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="Generate_Order_Reports" class="btn btn-primary btn-pill">Generate Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Orders  CSV Modal -->
<div class="modal fade modal-add-contact" id="get_orders_csv_report" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data" action="backoffice_generate_reports?type=CSV&module=Orders">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Filter Orders Using Dates</h5>
                </div>

                <div class="modal-body px-4">
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="firstName">Orders From Date</label>
                                <input type="date" required class="form-control" name="start_date">
                            </div>
                        </div>
                        <div class=" col-lg-6">
                            <div class="form-group">
                                <label for="firstName">Orders To Date</label>
                                <input type="date" required class="form-control" name="end_date">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="Generate_Order_Reports" class="btn btn-primary btn-pill">Generate Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Payments PDF Reports -->
<div class="modal fade modal-add-contact" id="get_payments_pdf_report" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data" action="backoffice_generate_reports?type=PDF&module=Payments">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Filter Payments Using Dates</h5>
                </div>

                <div class="modal-body px-4">
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="firstName">Payments From Date</label>
                                <input type="date" required class="form-control" name="start_date">
                            </div>
                        </div>
                        <div class=" col-lg-6">
                            <div class="form-group">
                                <label for="firstName">Payments To Date</label>
                                <input type="date" required class="form-control" name="end_date">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="Generate_Payments_Reports" class="btn btn-primary btn-pill">Generate Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Payments CSV Reports -->
<div class="modal fade modal-add-contact" id="get_payments_csv_report" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data" action="backoffice_generate_reports?type=CSV&module=Payments">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Filter Payments Using Dates</h5>
                </div>

                <div class="modal-body px-4">
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="firstName">Payments From Date</label>
                                <input type="date" required class="form-control" name="start_date">
                            </div>
                        </div>
                        <div class=" col-lg-6">
                            <div class="form-group">
                                <label for="firstName">Payments To Date</label>
                                <input type="date" required class="form-control" name="end_date">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="Generate_Payments_Reports" class="btn btn-primary btn-pill">Generate Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->