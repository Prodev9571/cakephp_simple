<h1>Contacts</h1>
<button class="btn btn-primary"><a href="index_ext" style="color: white;">View Companies</a></button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">
  Add Contact
</button>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Address</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($contacts as $contact): ?>
    <tr>
        <td><?= $contact->id ?></td>
        <td>
            <?= $this->Html->link($contact->first_name." ".$contact->last_name, ['action' => 'view', $contact->id]) ?>
        </td>
        <td>
            <?= $contact->phone_number ?>
        </td>
        <td>
            <?= $contact->address ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="modal" id="AddModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add a New Contact</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <!-- <form action="add" method="post"> -->
                <input id="csrfToken" type="hidden" value="<?= $this->request->getParam('_csrfToken') ?>">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" placeholder="Enter Your First Name" id="first_name" name="first_name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" placeholder="Enter Your Last Name" id="last_name" name="last_name">
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" placeholder="Enter Your Phone Number" id="phone_number" name="phone_number">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" placeholder="Enter Your Address" id="address" name="address">
                </div>
                <div class="form-group">
                    <label for="notes">Notes:</label>
                    <input type="text" class="form-control" placeholder="Enter Your Notes" id="notes" name="notes">
                </div>
                <div class="form-group">
                    <label for="add_notes">Add Notes:</label>
                    <textarea class="form-control" placeholder="Add Your Notes" id="add_notes" name="add_notes"></textarea>
                </div>
                <div class="form-group">
                    <label for="internal notes">Internal Notes:</label>
                    <textarea class="form-control" placeholder="Add your Internal Notes" id="internal_notes" name="internal_notes"></textarea>
                </div>
                <div class="form-group">
                    <label for="comments">Comments:</label>
                    <textarea class="form-control" placeholder="Add your Comments" id="comments" name="comments"></textarea>
                </div>
                <button type="button" id="btn_add" class="btn btn-primary">Add</button>
            <!-- </form> -->
        </div>
      </div>
    </div>
  </div>

  <script>
      $(document).ready(function (){
        $("#btn_add").on("click",function(){
            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var phone_number = $("#phone_number").val();
            var address = $("#address").val();
            var notes = $("#notes").val();
            var add_notes = $("#add_notes").val();
            var internal_notes = $("#internal_notes").val();
            var comments = $("#comments").val();
            $.ajax({
                url: "add",
                method: "post",
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', $("#csrfToken").val());
                },
                dataType: 'json',
                data:{
                    "first_name": first_name,
                    "last_name": last_name,
                    "phone_number": phone_number,
                    "address": address,
                    "notes": notes,
                    "add_notes": add_notes,
                    "internal_notes": internal_notes,
                    "comments": comments,
                },
                success: function(){
                    location.reload();
                }
            });
            setInterval(function(){location.reload()}, 2000);
        });
      });
  </script>