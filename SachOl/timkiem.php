<?php
if(isset($_GET['timkiem']))
{
    $tim = $_GET['timkiem'];
    switch($_GET['gia'])
{
case "1";
$sql ="select *FROM sanpham WHERE tensp like '%".$tim."%'and(gia between '0' and '50000')";
break;
case "2";
$sql ="select *FROM sanpham WHERE tensp like '%".$tim."%'and(gia between '50000' and '100000')";
break;
case "3";
$sql ="select *FROM sanpham WHERE tensp like '%".$tim."%'and(gia between '100000' and '200000')";
break;
case "4";
$sql ="select *FROM sanpham WHERE tensp like '%".$tim."%'and(gia between '200000' and '500000')";
break;
case "5";
$sql ="select *FROM sanpham WHERE tensp like '%".$tim."%'and(gia >='500000')";
break;
default:
$sql="select *FROM sanpham WHERE tensp like '%".$tim."%'";
break;
}
$rows = mysqli_query($link,$sql);
$tong = mysqli_num_rows($rows);
if($tong<=0)
{
echo "Không tìm được sản phẩm nào";
}
else
{
?>
<div class ="sanpham">
<h2> Từ Khóa <font color ="yellow"><b><?php echo $tim ?></b></font>: Có <?php echo $tong?> kết quả</h2>
<!-- Begin: sanphamcon -->
                <div class="sanphamcon">
                    <?php
						while($row=mysqli_fetch_array($rows))
                    {?>
                    <!-- Begin : dienthoai -->
                    <div class="dienthoai">
                        <?php
                        if($row['khuyenmai1']>0)
                        {
                        ?>
                        <div class="moi"><h3><?php echo $row['khuyenmai1'].'%'; ?></h3></div>
                        <?php } ?>
                        <a href="chitietsp.php"><img src="img/uploads/<?php echo $row['hinhanh'];?>"/></a>
                        <p><a href="#"><?php echo $row['tensp'];?></a></p>
                        <h4><?php echo number_format(($row['gia']*((100-$row['khuyenmai1'])/100)),0,",",".");?></h4>
                        
                        <!-- Begin:button -->
                        <div class="button">
                            <ul>
                                <li>
                                    <h1><a href="index.php?content=chitietsp&idsp=<?php echo $row['idsp']?>" class="chitiet">
                                        <button>Chi tiết</button>
                                    </a></h1>
                                </li>
                                <li>
                                    <h5><a href="index.php?content=cart&action=add&idsp=<?php echo $row['idsp']?>">
                                        <button>Cho vào giỏ</button>
                                    </a></h5>
                                </li>
                            </ul>
                        
                        </div>
                        <!-- End: Button -->
                        
                     </div>
                     <!-- End : dien thoai -->
                     
                      <?php } ?>
                    
                </div>
                <!--End : San pham con -->   
</div>


<?php
}
}
?>
