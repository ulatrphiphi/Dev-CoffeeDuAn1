<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<body>
    <div class="card-footer">
        <a href="index.php?act=thongke"><button type="submit" class="btn btn-primary" style="float:right;">Danh sách thống kê</button></a>
    </div>
    <canvas id="myChart" style="width:100%;max-width:1000px"></canvas>

    <script>
        const labels = [
            <?php
            $tongdm = count($listthongke);
            $i = 1;
            foreach ($listthongke as $thongke) {
                extract($thongke);
                if ($i == $tongdm) $dauphay = "";
                else $dauphay = ",";
                echo '"' . $thongke['tendm'] . '"' . $dauphay;
                $i += 1;
            }
            ?>
        ];

        const data = {
            labels: labels,
            datasets: [{
                backgroundColor: [
                    "#b91d47", "#00aba9", "#2b5797", "#e8c3b9", "#1e7145",
                    "#ff5733", "#33ff57", "#5733ff", "#ffa833", "#33ffa8"
                ],
                data: [
                    <?php
                    $i = 1;
                    foreach ($listthongke as $thongke) {
                        extract($thongke);
                        if ($i == $tongdm) $dauphay = "";
                        else $dauphay = ",";
                        echo $thongke['countsp'] . $dauphay;
                        $i += 1;
                    }
                    ?>
                ],
            }]
        };

        new Chart("myChart", {
            type: "pie",
            data: data,
            options: {
                title: {
                    display: true,
                    text: "THỐNG KÊ SẢN PHẨM THEO DANH MỤC"
                }
            }
        });
    </script>
</body>

</html>