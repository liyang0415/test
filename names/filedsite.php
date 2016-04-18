<form action="dreamdu.php" method="post" id="dreamduform">
    <fieldset>
        <legend>用户名与密码:</legend>
        <input id="hiddenField" name="hiddenField" type="hidden" value="hiddenvalue" />
        <label for="username">用户名:</label>
        <input type="text" id="username" name="username" value="dreamdu" />
        <label for="pass">密码:</label>
        <input type="password" id="pass" name="pass" />
    </fieldset>
    <fieldset>
        <legend>性别:</legend>
        <label for="boy">男</label>
        <input type="radio" value="1" id="sex" name="sex" />
        <label for="girl">女</label>
        <input type="radio" value="2" id="sex" name="sex" />
        <label for="sex">保密</label>
        <input type="radio" value="3" id="sex" name="sex" />
    </fieldset>
    <fieldset>
        <legend>我最喜爱的:</legend>
        <label for="computer">计算机</label>
        <input type="checkbox" value="1" id="fav" name="fav" />
        <label for="trval">旅游</label>
        <input type="checkbox" value="2" id="fav" name="fav" />
        <label for="buy">购物</label>
        <input type="checkbox" value="3" id="fav" name="fav" />
    </fieldset>
    <fieldset>
        <legend>对梦之都的意见:</legend>
        <label for="select">你对梦之都的感觉</label>
        <select size="1" id="select" name="select">
            <option>很全面,很好</option>
            <option>一般般吧,还要努力</option>
            <option>有很多问题,不过还可以</option>
        </select>
    </fieldset>
    <fieldset>
        <legend>梦之都编程语言选择:</legend>
        <label for="multipleselect">你想在梦之都学习的编程语言</label>
        <select size="10" multiple="multiple" id="multipleselect" name="multipleselect">
            <option>XHTML</option>
            <option>CSS</option>
            <option>JAVASCRIPT</option>
            <option>XML</option>
            <option>PHP</option>
            <option>C#</option>
            <option>JAVA</option>
            <option>C++</option>
            <option>PERL</option>
        </select>
    </fieldset>
    <fieldset>
        <legend>我要在梦之都学:</legend>
        <label for="WebDesign">选择一个你在梦之都最想学的</label>
        <select id="WebDesign" name="WebDesign">
            <optgroup label="client">
                <option value="HTML">HTML</option>
                <option value="CSS">CSS</option>
                <option value="javascript">javascript</option>
            </optgroup>
            <optgroup label="server">
                <option value="PHP">PHP</option>
                <option value="ASP">ASP</option>
                <option value="JSP">JSP</option>
            </optgroup>
            <optgroup label="database">
                <option value="Access">Access</option>
                <option value="MySQL">MySQL</option>
                <option value="SQLServer">SQLServer</option>
            </optgroup>
        </select>
    </fieldset>
    <fieldset>
        <legend>个人化信息:</legend>
        <label for="myimage">个性照片上传</label>
        <input type="file" id="myimage" name="myimage" size="35" maxlength="255" />
        <label for="contactus">联系我们</label>
        <textarea cols="50" rows="10" id="contactus" name="contactus">
            可爱的猴子
        </textarea>
    </fieldset>
    <fieldset>
        <legend>提交:</legend>
        <input type="submit" value="submit" id="submit" name="submit" />
        <input type="reset" value="reset" id="reset" name="reset" />
    </fieldset>
</form>