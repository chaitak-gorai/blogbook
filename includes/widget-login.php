<div class="well logs" id="login">
    <div class="heads">
        <h4>Login</h4>
        <form action="" method="post" id="login_form" onsubmit="return validate_form()">

            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Enter Username" id="user_name">
            </div>

            <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="Enter Password" id="user_pass">
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">
                        Login
                    </button>

                </span>

            </div>
        </form>
        <h4 style="text-align: center;">OR</h4>
        <a href="../registration.php">
            <button class="btn btn-success form-control" name="login" type="submit" value="Register">
                Register
            </button> </a>

        <!-- /.input-group -->
    </div>
</div>

<script>
    function showMsg(msg_text, style_classes= 'alert alert-danger') {
        const login_div = document.querySelector('#login');
        const login_parent = login_div.parentNode;
        const msg_div = document.querySelector('#msg') || document.createElement('div'); //Single sidebar message
        //const msg_div =  document.createElement('div'); // stacking sidebar messages
        const msg_span = document.createElement('span');
        msg_div.innerHTML = "";
        msg_div.style.cssText += 'display:flex;align-items: center;justify-content: space-between;';
        msg_div.className = style_classes;
        msg_div.id = 'msg'
        
        msg_span.innerText = msg_text;
        msg_div.appendChild(msg_span);
        
        const msg_close_button = document.createElement('button');
        msg_close_button.className = 'btn btn-danger'
        msg_close_button.innerText = 'X'
        msg_close_button.onclick = function(){this.parentElement.remove()};
        msg_div.appendChild(msg_close_button);
        
        login_parent.insertBefore(msg_div, login_div); // insert message before login element
        //login_parent.insertBefore(msg_div, login_div.nextSibling); // insert message after login element
    }
</script>
<script type='text/javascript'>
    async function validate_form() {
        event.preventDefault();
        const formData = new FormData(document.querySelector('#login_form')) 

        if (formData.get('username') === "" || formData.get('password') === "") {
            showMsg('Fields cannot be empty!');
            return false;
        }

        let response = await fetch('includes/login.php', { method: 'POST', body: formData});
        let data = await response.json();

        if(data.status == 'success') {
            showMsg(data.msg, 'alert alert-success');
            location.href = location.origin + "/admin/index.php";
        }
        else if (data.status == 'error') {
            showMsg(data.msg);
        }
    }
</script>