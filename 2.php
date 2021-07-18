
<form method="post" action="test.php" name="contactform" id="contactform">
    <div class="grid_6" id="register">
    <center><h4>Required Information</h4></center>
    <p>
      <label for="name">Name:</label>
      <input name="name" id="name" type="text" />
    </p>
    <p>
      <label for="email">Your Email:</label>
      <input name="email" id="email" type="text" />
    </p>
    <p>
    <label for="trew">Contact Phone:</label>
    <input name="txtAreaCode" id="txtAreaCode" style="width: 30px;" maxlength="3" value=""type="text">
    <span style="color: rgb(255, 200, 46);">&nbsp;-&nbsp;</span>
    <input name="txtPrefix" id="txtPrefix" style="width: 30px;" maxlength="3" value=""type="text">
    <span style="color: rgb(255, 200, 46);">&nbsp;-&nbsp;</span>
    <input name="txtPhone" id="txtPhone" style="width: 45px;" maxlength="4" value=""type="text">
    <span style="color: rgb(255, 200, 46);">&nbsp;-&nbsp;</span>
    <input name="txtPhoneExt" id="txtPhoneExt" style="width: 35px;" maxlength="10" value=""type="text">
    ext.
    </p>
    <p>
      <label for="zip">Zip Code:</label>
      <input name="zip" id="zip" type="text" />
    </p>
    <p>
      <label for="school">Name of School:</label>
      <input name="school" id="school" type="text" />
    </p>
    <p>
      <label for="title">Affiliation</label>
      <select name="title" id="title">
      <option selected="NULL">Please Select</option>
      <option value="student">Student</option>
      <option value="parent">Parent</option>
      <option value="teacher">Teacher</option>
      <option value="booster">Booster</option>
      <option value="clubpres">Club President</option>
      <option value="principal">Principal</option>
      <option value="ptsa">PTSA</option>
      </select>
    </p>
    </div>
    <div class="grid_6" id="contactinfo">
    <center><h4>Additional Information</h4></center>
    <p>
      <label for="color">School Colors:</label>
      <input name="color" id="color" type="text" />
    </p>
    <p>
      <label for="mascot">Mascot:</label>
      <input name="mascot" id="mascot" type="text" />
    </p>
    <p>
      <label for="tagline">Tagline/Motto:</label>
      <input name="tagline" id="tagline" type="text" />
    </p>
    <p>
      <label for="sbsize">Approximate Student Body Size:</label>
      <input name="sbsize" id="sbsize" type="text" />
    </p>
    <p>
      <label for="level">Interest Level:</label>
      <select name="level" id="level">
      <option value="1">Interested</option>
      <option value="2">Slightly Interested</option>
      <option value="3">Moderately Interested</option>
      <option value="4">Highly Interested</option>
      <option value="5">Extremely Interested</option>
      </select>
    </p>
    <p>
      <label for="verify">1 + 3 =</label>
      <input name="verify" id="verify" class="small" type="text" />
    </p>
    <button class="fr" type="submit" id="submit">Send</button>
  </form>
  </div>
