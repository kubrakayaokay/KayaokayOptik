<section class="products pt-0">


    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <br />
                <br />

                <div class="filter-box active">
                    <h3>Marka</h3>
                    <?php foreach ($data['brand_data']->result_array() as $row): ?>
                        <label class="col-sm-12">
                            <input type="checkbox" class="common_selector brand"
                                   value="<?= $row['brand_id'] ?>">
                            <?= get_brand_name($row['brand_id'])  ?>
                        </label>
                    <?php endforeach; ?>
                </div>


                <div class="filter-box active">
                    <h3>Çerçeve Materyali</h3>
                    <?php foreach ($data['frame_material_data']->result_array() as $row): ?>
                        <label class="col-sm-12">
                            <input type="checkbox" class="common_selector frame"
                                   value="<?= $row['frame_material'] ?>">
                            <?= $row['frame_material'] ?>
                        </label>
                    <?php endforeach; ?>
                </div>

                <div class="filter-box active">
                    <h3>Cam Materyali</h3>
                    <?php foreach ($data['glass_material_data']->result_array() as $row): ?>
                        <label class="col-sm-12">
                            <input type="checkbox" class="common_selector glass"
                                   value="<?= $row['glass_material'] ?>">
                            <?= $row['glass_material'] ?>
                        </label>
                    <?php endforeach; ?>
                </div>

            </div>

            <div class="col-md-9">
                <br />
                <br />
                <div class="row filter_data">

                </div>

                <br />
                <br />
                <br />
                <div align="center" id="pagination_link">

                </div>
            </div>
        </div>

    </div>
    <style>
        #loading
        {
            text-align:center;
            background: url('<?php echo base_url(); ?>assets/img/loader.gif') no-repeat center;
            height: 250px;
        }
    </style>

    <script>
        $(document).ready(function(){

            filter_data(1);

            function filter_data(page)
            {
                $('.filter_data').html('<div id="loading" style="margin-top: 150px" ></div>');
                var action = 'fetch_data';
                var brand = get_filter('brand');
                var frame = get_filter('frame');
                var glass = get_filter('glass');
                $.ajax({
                    url:"<?php echo base_url(); ?>products/fetch_data/"+page,
                    method:"POST",
                    dataType:"JSON",
                    data:{action:action,brand:brand, frame:frame, glass:glass},
                    success:function(data)
                    {
                        $('.filter_data').html(data.product_list);
                        $('#pagination_link').html(data.pagination_link);
                    }
                })
            }

            function get_filter(class_name)
            {
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }

            $(document).on('click', '.pagination li a', function(event){
                event.preventDefault();
                var page = $(this).data('ci-pagination-page');
                filter_data(page);
            });

            $('.common_selector').click(function(){
                filter_data(1);
            });


        });
    </script>


</section>
