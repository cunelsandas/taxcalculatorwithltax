<?php
		$yeareng2=$yeareng-1;
				$sqlSale="select month(Date) as m1,sum(TotalPrice) as TP from sale_master Where year(Date)='$yeareng' Group By month(Date)";
				$rsSale=rsQuery($sqlSale);
				if($rsSale){
				
					$chartLabel="ยอดขายรายเดือน ปี ". ($yeareng+543);
					while($dt=mysqli_fetch_array($rsSale)){
						$label .=$dt['m1'].',';
						$chartData .=$dt['TP'].',';
					}
				}

				$sqlSale="select month(Date) as m1,sum(TotalPrice) as TP from sale_master Where year(Date)='$yeareng2' Group By month(Date)";
				$rsSale=rsQuery($sqlSale);
				if($rsSale){
				
					$chartLabel2="ยอดขายรายเดือน ปี ". ($yeareng2+543);
					while($dt=mysqli_fetch_array($rsSale)){
						$label2 .=$dt['m1'].',';
						$chartData2 .=$dt['TP'].',';
					}
				}

			
				// Quotation Chart
			$sqlSale="select month(Date) as m1,sum(TotalPrice) as TP,Status from quotation_master Where year(Date)='$yeareng' Group By month(Date),Status";
				$rsSale=rsQuery($sqlSale);
				if($rsSale){
				
					$quochartLabel="เสนอราคารอดำเนินการ ปี ". ($yeareng+543);
					$quochartLabel2="เสนอราคาสำเร็จ ปี ". ($yeareng+543);
					while($dt=mysqli_fetch_array($rsSale)){
						$quolabel .=$dt['m1'].',';
						if($dt['Status']==0){
						$quochartData .=$dt['TP'].',';
						}
						if($dt['Status']==1){
						$quochartData2 .=$dt['TP'].',';
						}
					}
				}
		
			//Customer Province Chart
			$sqlPro="select count(distinctrow CustomerCode)as custunit,customer.Province,th_province.PROVINCE_NAME as proname from sale_master left join customer on sale_master.CustomerCode=customer.Code Inner join th_province ON customer.Province=th_province.PROVINCE_ID where year(Date)='$yeareng' Group by customer.Province Order by custunit";
			$rsPro=rsQuery($sqlPro);
			if($rsPro){
				
				while($dataPro=mysqli_fetch_array($rsPro)){
					$labelPro .='"'.trim($dataPro['proname']).$dataPro['custunit'] .'",';
					$dataPro2 .=$dataPro['custunit'].",";
					$totalCust +=$dataPro['custunit'];
					 $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
					 $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
					 $chartColor .='"'.$color.'",';
				}
				$prochartLabel="จำนวนลูกค้า ปี ".($yeareng+543). "รวม ".$totalCust;
			}
?>


<table width="100%"> 
		<tr>
			<td width="60%">
				<canvas id="myChart" width="400" height="200"></canvas>
			</td>
			<td rowspan='2' width="40%">
				<canvas id="proChart" width="400" height="500"></canvas>
			</td>
		</tr>
		<tr>
			<td>
				<canvas id="quoChart" width="400" height="200"></canvas>
			</td>
		</tr>
	</table>

 <link type="text/css" href="js/chart/Chart.min.css" rel="stylesheet" />	
<script src="js/chart/Chart.min.js"></script>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
		
        labels: [<?php echo $label2;?>],
        datasets: [{
             label: '<?php echo $chartLabel2;?>',
				data: [<?php echo $chartData2;?>],
				type:'line'
        },{
				 label: '<?php echo $chartLabel;?>',
            data: [<?php echo $chartData;?>],
			backgroundColor: 'rgba(246, 36, 89, 1)',
			borderColor:'rgba(240, 255, 0, 1)',
				 borderWidth:1
		}]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

<script>
var ctx2 = document.getElementById('quoChart');
var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
		
        labels: [<?php echo $label2;?>],
        datasets: [{
             label: '<?php echo $quochartLabel2;?>',
				data: [<?php echo $quochartData2;?>],
				type:'bar',
				 	backgroundColor: 'rgba(140, 20, 252, 1)',
			borderColor:'rgba(240, 255, 0, 1)',
				 borderWidth:1
        },{
				 label: '<?php echo $quochartLabel;?>',
            data: [<?php echo $quochartData;?>],
		
		}]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

<script>
var ctx3 = document.getElementById('proChart');
var myChart3 = new Chart(ctx3, {
    type: 'pie',
    data: {
      labels: [<?php echo $labelPro;?>],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: [<?php echo $chartColor;?>],
        data: [<?php echo $dataPro2;?>]
      }]
    },
    options: {
      title: {
        display: true,
        text: '<?php echo $prochartLabel;?>'
      }
    }
});

</script>