<div class="container">
    <h1>ADR tanúsítvány hozzáadása</h1>
    <div class="borderForForm">
        <?php
            if($_SESSION['type']=="driver"){
        ?>
            <form name="addForDriver" action="index.php?page=editADR" method="post">
            <fieldset>
                <legend class="text-center">Hozzáadás</legend>
                <div class="input-group">
			        <label for="addADR">Hozzáadni kívánt ADR osztály:</label>
        	            <select class="form-control" name="addADR" id="addADR" required>
            	            <option value="">Válasszon ADR osztályt!</option>
				                <?php
                	                if ($adrIDs) {
						                foreach($adrIDs as $row) {
                                            if(!in_array($row,array_intersect($driverADRs,$adrIDs)) and $row!=9){
                                                $ADR->set_adr($row, $conn);
                                                if($ADR->get_name()) echo '<option value="'.$row.'">'.$ADR->get_name().' ('.$ADR->get_comment().')</option>';
                                            }
						                }
					                }
				                ?>							
			            </select>
		        </div>
            </fieldset>
            </form>
            <button class="btn btn-primary rounded-pill m-2" onclick="driverConfirmAdd()">Hozzáadás</button>
        <?php
            }else if($_SESSION['type']=="admin"){
        ?>
        <form name="addForAdmin" action="index.php?page=editADR" method="post">
            <fieldset>
            <legend class="text-center">Hozzáadás</legend>
            <div class="input-group">
			        <label for="selDriverAdd">Felhasználó azonosítója:</label>
        	        <select class="form-control" name="selDriverAdd" id="selDriverAdd" required>
            	    <option value="">Válasszon ki felhasználót!</option>
				        <?php
                	        if ($driverIDs) {
						        foreach($driverIDs as $row) {
                                    $driver->set_user($row, $conn);
                                    if(!(in_array($driver->get_id(),$admins))){
                                        if($driver->get_id()) echo '<option value="'.$row.'">'.$driver->get_username().'</option>';
                                    }else{
                                        echo $driver->get_username();
                                    }
						        }
					        }
				        ?>							
			        </select>
		        </div>
                <br>
                <div class="input-group">
			        <label for="addADR">Hozzáadni kívánt ADR osztály:</label>
        	            <select class="form-control" name="addADR" id="addADR" required>
            	            <option value="">Válasszon ADR osztályt!</option>						
			            </select>
		        </div>
            </fieldset>
        </form>
        <button class="btn btn-primary rounded-pill m-2" onclick="adminConfirmAdd()">Hozzáadás</button>
        <script type="text/javascript">
                $("#selDriverAdd").on("change", function(){
                    let driverID = $(this).val();
                    let action = "add";
                    $.ajax({
                        url :"ajax/updateADRList.php",
                        type:"POST",
                        cache:false,
                        data:{driverID:driverID,action:action},
                    success:function(data){
                        $("#addADR").html(data);
                    }
                    });
                });
        </script>
        <?php
            }
        ?>
    </div>
</div>
<div class="container">
    <h1>ADR tanúsítvány törlése</h1>
    <div class="borderForForm">
        <?php
            if($_SESSION['type']=="driver"){
        ?>
            <form name="delForDriver" action="index.php?page=editADR" method="post">
                <fieldset>
                <legend class="text-center">Törlés</legend>
                <div class="input-group">
			        <label for="delADR">Törölni kívánt ADR osztály:</label>
        	            <select class="form-control" name="delADR" id="delADR" required>
            	            <option value="">Válasszon ADR osztályt!</option>	
                            <?php
                                foreach($adrIDs as $row){
                                    $ADR->set_adr($row,$conn);
                                    if(in_array($row,array_intersect($driverADRs,$adrIDs)) and $row!=9){
                                        echo '<option value="'.$row.'">'.$ADR->get_name().'('.$ADR->get_comment().')'.'</option>';
                                    }
                                }
                            ?>
			            </select>
		        </div>
            </fieldset>
            </form>
            <button class="btn btn-primary rounded-pill m-2" onclick="driverConfirmDel()">Törlés</button>
        <?php
            }else if($_SESSION['type']=="admin"){
        ?>
            <form name="delForAdmin" action="index.php?page=editADR" method="post">
                <fieldset>
                <legend class="text-center">Törlés</legend>
                <div class="input-group">
			        <label for="selDriverDel">Felhasználó azonosítója:</label>
        	        <select class="form-control" name="selDriverDel" id="selDriverDel" required>
            	    <option value="">Válasszon ki felhasználót!</option>
				        <?php
                	        if ($driverIDs) {
						        foreach($driverIDs as $row) {
                                    $driver->set_user($row, $conn);
                                    if(!(in_array($driver->get_id(),$admins))){
                                        if($driver->get_id()) echo '<option value="'.$row.'">'.$driver->get_username().'</option>';
                                    }else{
                                        echo $driver->get_username();
                                    }
						        }
					        }
				        ?>							
			        </select>
		        </div>
                <br>
                <div class="input-group">
			        <label for="delADR">Törölni kívánt ADR osztály:</label>
        	            <select class="form-control" name="delADR" id="delADR" required>
            	            <option value="">Válasszon ADR osztályt!</option>					
			            </select>
		        </div>
            </fieldset>
            </form>
            <button class="btn btn-primary rounded-pill m-2" onclick="adminConfirmDel()">Törlés</button>
            <script type="text/javascript">
                $("#selDriverDel").on("change", function(){
                    let driverID = $(this).val();
                    let action = "del";
                    $.ajax({
                        url :"ajax/updateADRList.php",
                        type:"POST",
                        cache:false,
                        data:{driverID:driverID, action:action},
                    success:function(data){
                        $("#delADR").html(data);
                    }
                    });
                });
            </script>
        <?php
            }
        ?>
    </div>
</div>
<script src="js/adr.js"></script>