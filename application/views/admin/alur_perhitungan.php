<div class="page-fixed-main-content">
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Alur Perhitungan</h2>
                </div>
                <div class="x_content" id="calculation">
                    <?php if (isset($_SESSION['solution_matrix'], $_SESSION['distance_result'], $_SESSION['normalized_result'], $_SESSION['result'], $_SESSION['unormalized_result'], $_SESSION['sekolah'])): ?>
                            <h4>Data</h4>
                            <table class="table table-bordered table-hover table-striped" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Sekolah</th>
                                        <?php foreach ($_SESSION['unormalized_result'][0] as $key => $value): ?>
                                            <th><?= $key ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($_SESSION['unormalized_result'] as $i => $row): ?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <td><?= $_SESSION['sekolah'][$i]['nama_sekolah'] ?></td>
                                            <?php foreach ($row as $k => $cell): ?>
                                                <td><?= $cell ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <h4>Matriks Keputusan Ternormalisasi</h4>
                            <div style="width: 100%; overflow-x: scroll;">
                                <table class="table table-bordered table-hover table-striped" style="width: 100% !important;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Sekolah</th>
                                            <?php foreach ($_SESSION['normalized_result'][0] as $key => $value): ?>
                                                <th><?= $key ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($_SESSION['normalized_result'] as $i => $row): ?>
                                            <tr>
                                                <td><?= $i + 1 ?></td>
                                                <td><?= $_SESSION['sekolah'][$i]['nama_sekolah'] ?></td>
                                                <?php foreach ($row as $k => $cell): ?>
                                                    <td><?= $cell ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>    
                            </div>
                            

                            <h4>Matriks Keputusan Ternormalisasi Terbobot</h4>
                            <div style="width: 100%; overflow-x: scroll;">
                                <table class="table table-bordered table-hover table-striped" style="width: 100% !important;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Sekolah</th>
                                            <?php foreach ($_SESSION['weighted_result'][0] as $key => $value): ?>
                                                <th><?= $key ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($_SESSION['weighted_result'] as $i => $row): ?>
                                            <tr>
                                                <td><?= $i + 1 ?></td>
                                                <td><?= $_SESSION['sekolah'][$i]['nama_sekolah'] ?></td>
                                                <?php foreach ($row as $k => $cell): ?>
                                                    <td><?= $cell ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <h4>Matriks Solusi Ideal</h4>
                            <table class="table table-bordered table-hover table-striped" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th>-</th>
                                        <?php foreach ($_SESSION['solution_matrix']['positive'] as $key => $value): ?>
                                            <th><?= $key ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($_SESSION['solution_matrix'] as $key => $value): ?>
                                        <tr>
                                            <td><?= $key ?></td>
                                            <?php foreach ($value as $k => $cell): ?>
                                                <td><?= $cell ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <h4>Jarak Solusi Ideal</h4>
                            <table class="table table-bordered table-hover table-striped" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th>-</th>
                                        <th>Nama Sekolah</th>
                                        <th>Jarak Positif</th>
                                        <th>Jarak Negatif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($_SESSION['distance_result'] as $i => $row): ?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <td><?= $_SESSION['sekolah'][$i]['nama_sekolah'] ?></td>
                                            <td><?= $row['positive'] ?></td>
                                            <td><?= $row['negative'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <h4>Table Nilai Preferensi</h4>
                            <table class="table table-bordered table-hover table-striped" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th>-</th>
                                        <th>Nama Sekolah</th>
                                        <th>Preferensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($_SESSION['result'] as $i => $row): ?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <td><?= $_SESSION['sekolah'][$i]['nama_sekolah'] ?></td>
                                            <td><?= $row ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>Anda belum melakukan pencarian</p>
                            <?php var_dump($_SESSION); ?>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // $.ajax({
        //     url: '<?= base_url('admin/rank') ?>',
        //     type: 'POST',
        //     data: data,
        //     beforeSend: function() {
        //         $('#result').css('display', 'none');
        //         $('#loader').css('display', 'block');
        //     },
        //     success: function(response) {
        //         let json = $.parseJSON(response);
        //         let data = json.rank;
        //         let session = json.session;
        //         showCalculation(session);

        //         $('#result').css('display', 'block');
        //         $('#loader').css('display', 'none');

        //         let html = '';
        //         for (let i = 0; i < data.length; i++) {
        //             html += '<a href="<?= base_url('user/detail-sekolah') ?>/' + data[i].id + '">' +
        //                 '<div class="w-clearfix w-preserve-3d promo-card">' +
        //                         '<img width="100%" height="200" src="' + data[i].foto + '">' +
        //                         '<div class="blog-bar color-pink"></div>' +
        //                         '<div class="blog-post-text">' +
        //                             data[i].nama_sekolah +
        //                             '<div class="blog-description pink-text">' + data[i].biaya_masuk + '</div>' +
        //                         '</div>' +
        //                     '</div>' +
        //                 '</a>';
        //         }

        //         $('#result').html((data.length > 0 ? html : '<p>No results found</p>'));
        //     },
        //     error: function(error) { 
        //         console.log(error.responseText); 
        //         $('#result').css('display', 'block');
        //         $('#loader').css('display', 'none');    
        //     }
        // });
    });
    function showCalculation(data) {
        let html = '<h4>Data</h4>' +
            '<table class="table table-bordered table-hover table-striped" style="width: 100% !important;">' +
                '<thead>' +
                    '<tr>' +
                        '<th>No.</th>';

        for (let key in data.unormalized_result[0]) {

            html += '<th>' + key  + '</th>';

        }
                        
        html += '</tr></thead><tbody>';
        
        for (let i = 0; i < data.unormalized_result.length; i++) {
            html += '<tr>';
                html += '<td>' + (i + 1) + '</td>';
                for (let key in data.unormalized_result[i]) {
                    html += '<td>' + data.unormalized_result[i][key] + '</td>';
                }
            html += '</tr>';
        }
                
        html += '</tbody></table>';

        html += '<h4>Matriks Keputusan Ternormalisasi Terbobot</h4>' +
            '<table class="table table-bordered table-hover table-striped" style="width: 100% !important;">' +
                '<thead>' +
                    '<tr>' +
                        '<th>No.</th>';

        for (let key in data.normalized_result[0]) {

            html += '<th>' + key  + '</th>';

        }
                        
        html += '</tr></thead><tbody>';
        
        for (let i = 0; i < data.normalized_result.length; i++) {
            html += '<tr>';
                html += '<td>' + (i + 1) + '</td>';
                for (let key in data.normalized_result[i]) {
                    html += '<td>' + data.normalized_result[i][key] + '</td>';
                }
            html += '</tr>';
        }
                
        html += '</tbody></table>';

        html += '<h4>Matriks Solusi Ideal</h4>' +
                    '<table class="table table-bordered table-hover table-striped" style="width: 100% !important;">' +
                        '<thead>' +
                            '<tr>' +
                                '<th>-</th>';

        for (let key in data.solution_matrix.positive) {
            html += '<th>' + key  + '</th>';
        }
        html += '</tr></thead><tbody>';

        for (let key in data.solution_matrix) {

            html += '<tr>';
                html += '<td>' + key + '</td>';
                for (let k in data.solution_matrix[key]) {
                    html += '<td>' + data.solution_matrix[key][k] + '</td>';
                }
            html += '</tr>';
        }

        html += '</tbody></table>';

        html += '<h4>Jarak Solusi Ideal</h4>' +
                    '<table class="table table-bordered table-hover table-striped" style="width: 100% !important;">' +
                        '<thead>' +
                            '<tr>' +
                                '<th>-</th>' +
                                '<th>Jarak Positif</th>' +
                                '<th>Jarak Negatif</th>' +
                            '</tr>' +
                        '</thead>' +
                        '<tbody>';

        for (let i = 0; i < data.distance_result.length; i++) {
            html += '<tr>';
                html += '<td>' + (i + 1) + '</td>';
                html += '<td>' + data.distance_result[i].positive + '</td>';
                html += '<td>' + data.distance_result[i].negative + '</td>';
            html += '</tr>';
        }

        html += '</tbody></table>';

        html += '<h4>Table Nilai Preferensi</h4>' +
                    '<table class="table table-bordered table-hover table-striped" style="width: 100% !important;">' +
                        '<thead>' +
                            '<tr>' +
                                '<th>-</th>' +
                                '<th>Preferensi</th>' +
                            '</tr>' +
                        '</thead>' +
                        '<tbody>';

        for (let i = 0; i < data.result.length; i++) {
            html += '<tr>';
                html += '<td>' + (i + 1) + '</td>';
                html += '<td>' + data.result[i] + '</td>';
            html += '</tr>';
        }
        
        html += '</tbody></table>';
        
        $('#calculation').html(html);
            
    }

</script>