<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Court Name</th>
            <th>Start</th>
            <th>End</th>
            <th>Hours</th>
            <th>Amount</th>
            <th>Payment Status</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    	<?php foreach($myreservationlist as $key => $val): ?>
        <tr>
            <td><?php echo $val['title'] ?></td>
            <td><?php echo $val['CroCourts']['name'] ?></td>
            <td><?php echo date('F j, Y g:i a', strtotime($val['start'])) ?></td>
            <td><?php echo date('F j, Y g:i a', strtotime($val['end'])) ?></td>
            <td><?php echo $val['hours'] ?></td>
            <td><?php echo $val['amount'] ?></td>
            <td>
                <?php 
                    if($val['paymentstatus'] == 'Completed'){
                        echo 'Paid';
                    } else {
                        echo 'Pending';
                    }
                ?>
            </td>
            <td><?php 
            	if($val['status']){
            		echo 'Active';
            	} else {
            		echo 'Inactive';
            	}
            	?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>