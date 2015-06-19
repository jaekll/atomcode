# URL规则 #

作者本人是一个程序员，身上有一个强大的特点就是固执。

作者固执的认为：

  * URL要像代码一样干净漂亮

  * URL要有含义，不要有多余的不易理解的内容存在，也不要一长串内容却不能表达出要表达的意思，例如：http://www.taobao.com/go/chn/cod/item_index.php?spm=1.1000386.220838.4&TBG=41105.125183.12 这样的一个URL你能了解到多少信息？

  * URL要符合一般URL规则，最好符合 REST 原则，而要传递的参数要么通过POST来传递，要么通过查询参数来传递，而不要将查询参数也混合在路径中（此处指的CodeIgniter的URL规则）

所以规则如下：

http://www.example.com/[index.php[?]/][dir1/][dir2/][...][controller[/method]]

以上方括号表示可选内容。其中 index.php[?]这部分如果要想取消，请参考[如何安装](Installation.md)

dir部分可以无限多个

controller和method没有指定时默认为index