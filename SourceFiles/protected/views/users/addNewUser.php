<article class="article-forms">
    <div class="forms">
        <form action="http://localhost/Webprog2File/SourceFiles/start.php?U=users&M=add" method="post" accept-charset="UTF-8">
            <h1>Registration</h1>
            <hr>
            <div class="forms-wrap">
                <div class="inputs">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" id="fullname" placeholder="Enter your Fullname !" required="required">
                </div>
                <div class="inputs">
                    <label for="dateofbirth">Date of Birth</label>
                    <input type="date" name="dateofbirth" id="dateofbirth" placeholder="" required="required">
                </div>
                <div class="inputs">
                    <label for="placeofbirth">Place of Birth</label>
                    <input type="text" name="placeofbirth" id="placeofbirth" placeholder="Enter your Place of Birth" required="required">
                </div>
                <div class="inputs">
                    <label for="children">How many children do you have?</label>
                    <input type="number" name="children" id="children" placeholder="How many children do you have?" required="required">
                </div>
                <div class="inputs">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="Male" required>Male</option>
                        <option value="Female" required>Female</option>
                    </select>
                </div>
                <div class="inputs">
                    <label for="language">Do you have a language exam?</label><br>
                    <input type="radio" id="yes" name="language_exam" value="yes">
                    <label for="yes">Yes</label>
                    <input type="radio" id="no" name="language_exam" value="no">
                    <label for="no">No</label>
                </div>
                <div class="inputs">
                    <label for="role">Please Choose Role</label>
                    <select name="role" id="role">
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="Employee">Employee</option>
                        <option value="User">User</option>
                    </select>
                </div>
            </div>
            <div class="submit-btn">
                <input type="submit" name="send" value="Send">
            </div>
        </form>
    </div>
</article>