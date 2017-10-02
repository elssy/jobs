<!-- nav-tabs -->
<ul class="site-sidebar-nav nav nav-tabs nav-tabs-line" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#sidebar-userlist" role="tab">
      <i class="icon wb-chat" aria-hidden="true"></i>
    </a>
  </li>
</ul>

<div class="site-sidebar-tab-content tab-content">
  <div class="tab-pane fade active show" id="sidebar-userlist">
    <div>
      <div>
        <h5 class="clearfix">OTHER USERS
         
        </h5>
        <?php 
          session_start();
          require_once 'core.php';
          $query  = mysql_query("SELECT * FROM `users` WHERE `username`= '!{$_SESSION['GuyJob3']}'");

        ?>
        <div class="list-group">
          <a class="list-group-item" href="javascript:void(0)" data-toggle="show-chat">
            <div class="media">
             
              <div class="media-body">
                <?php

                 while($data  = mysql_fetch_array($query)){
                  $id          = $data['id'];
                  $user        = $data['username'];
                  $designation = $data['designation'];
                
                ?>
                <h5 class="mt-0 mb-5"><?php echo $user;  ?></h5>
                <small><?php echo $designation;  ?></small>
              </div>
            </div>
          </a>
        </div>
        
      </div>
    </div>
  </div>

</div>
<?php } ?>
<div id="conversation" class="conversation">
<?php
  $queryy  = mysql_query("SELECT * FROM `chats`");

           while($data  = mysql_fetch_array($queryy)){
                  
        ?>
  <div class="conversation-header">
    <a class="conversation-more float-right" href="javascript:void(0)">
      <i class="icon wb-more-horizontal" aria-hidden="true"></i>
    </a>
    <a class="conversation-return float-left" href="javascript:void(0)" data-toggle="close-chat">
      <i class="icon wb-chevron-left" aria-hidden="true"></i>
    </a>
    <div class="conversation-title"><?php  ?></div>
  </div>
  <div class="chats">
    <div class="chat chat-left">
      
      <div class="chat-body">
        <div class="chat-content">
          <p>
            <?php echo $message; ?>
          </p>
          <time class="chat-time"><?php  ?></time>
        </div>
      </div>
    </div>
    <div class="chat">
      
      <div class="chat-body">
        <div class="chat-content">
          <p>
            <?php ?>
          </p>
          <time class="chat-time"><?php  ?></time>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="conversation-reply">
    <div class="input-group">
      <input class="form-control" type="text" id="message" placeholder="Reply">
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function()
    {
        if (!event.which && ((event.charCode || event.charCode === 0) ? event.charCode : event.keyCode)) {
             event.which = event.charCode || event.keyCode;
         }

         $('#en input').bind('keypress', function(e) {
             if (e.which === 13) {

                var message  = $('#message').val();
                  
                  $.post("sendmessage.php",
                    {
                      message:message
                    },
                  );
                   
             }
         }); 
    });
</script>