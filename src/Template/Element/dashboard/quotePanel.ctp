<!-- quoted panel-->
<div id="quote" class="col-lg-3 col-md-6">
    <div class="panel panel-yellow">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3 huge">
                    <?php
                        $allJobs = array();
                            foreach ($jobs as $job):
                                array_push($allJobs, $job);
                            endforeach;
                        $list = array_filter($allJobs, function($job){
                            return $job->job_status == 'Quote';
                        });
                        echo count($list);
                    ?>
                </div>
                <div class="col-lg-8 text-right">
                    <h3>Quoted</h3>
                </div>
            </div>
        </div>
        <a onclick="showQuoted()">
            <div class="panel-footer">
                <span class="pull-left">Show</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
<script>
    function showQuoted(){
        var quotedRef = document.getElementById('quoted');
        var nonquotedRef = document.getElementById('non-quoted');
        quotedRef.style.display = 'block';
        nonquotedRef.style.display = 'none';
    }
</script>