<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="float-left">Add Dataset</h4>
                    <div class="float-right">
                        <a href="<?=site_url('dataset')?>" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?=site_url('dataset/process')?>" method="post">
                            <div class="form-group">
                                <label>Alert Year *</label>
                                <input type="number" name="alert_year" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Alert Week *</label>
                                <input type="number" name="alert_week" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Burn Area (Ha) *</label>
                                <input type="number" name="burn_area" class="form-control" required>
                            </div>
                            <button type="submit" name="create" class="btn btn-success mr-2">Save</button>
                            <button type="reset" class="btn btn-light">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>