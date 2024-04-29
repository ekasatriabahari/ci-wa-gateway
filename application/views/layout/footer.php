

                </div>


                <!-- CONTENT AREA -->

            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url('assets/ui/') ?>js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url('assets/ui/') ?>bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url('assets/ui/') ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/ui/') ?>plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('assets/ui/') ?>js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });


        /* Using Websocket to get data realtime */
        let socket = new WebSocket("ws://localhost:5001/read-message?session=abc");

        socket.onopen = function(e) {
          alert("[open] Connection established");
          alert("Sending to server");
          socket.send("My name is John");
        };

        socket.onmessage = function(event) {
          alert(`[message] Data received from server: ${event.data}`);
        };

        socket.onclose = function(event) {
          if (event.wasClean) {
            alert(`[close] Connection closed cleanly, code=${event.code} reason=${event.reason}`);
          } else {
            // e.g. server process killed or network down
            // event.code is usually 1006 in this case
            alert('[close] Connection died');
          }
        };

        socket.onerror = function(error) {
          alert(`[error]`);
          console.log(error);
        };

    </script>
    <script src="<?= base_url('assets/ui/') ?>js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>