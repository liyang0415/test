<!-- <div id="app">
  <input v-model="newTodo" v-on:keyup.enter="addTodo">
  <ul>
    <li v-for="todo in todos">
      <span>{{ todo.text }}</span>
      <button v-on:click="removeTodo($index)">X</button>
    </li>
  </ul>
</div>
new Vue({
  el: '#app',
  data: {
    newTodo: '',
    todos: [
      { text: 'Add some todos' }
    ]
  },
  methods: {
    addTodo: function () {
      var text = this.newTodo.trim()
      if (text) {
        this.todos.push({ text: text })
        this.newTodo = ''
      }
    },
    removeTodo: function (index) {
      this.todos.splice(index, 1)
    }
  }
}) -->
<html>
<head>
<script type="text/javascript">
var txt=""
function message()
{
try
   {
   adddlert("Welcome guest!")
   }
catch(err)
   {
   txt="本页中存在错误。\n\n"
   txt+="错误描述：" + err.description + "\n\n"
   txt+="点击“确定”继续。\n\n"
   alert(txt)
   }
}
</script>
</head>

<body>
<input type="button" value="查看消息" onclick="message()" />
</body>

</html>
