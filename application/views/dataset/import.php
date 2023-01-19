<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="float-left">Import Dataset</h4>
                    <div class="float-right">
                        <a href="<?=site_url('dataset')?>" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <br>
                <p class="card-description">Data from <a href="https://globalforestwatch.org/dashboards/global/?category=fires" target="_blank">globalforestwatch.org</a></p>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?=site_url('dataset/process')?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>File CSV *</label>
                                <input type="file" name="file_csv" class="form-control" required>
                            </div>
                            <button type="submit" name="import" class="btn btn-success mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>