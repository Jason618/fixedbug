
###在写页面和布局样式的时候，这样的场景可能会经常出现，两个span标签，display属性值为inline-block,然后神奇的3px间隙出现啦。（简介）
####正文开始）首先我们来看看我们的html和css是怎么写的。 
  html:

	<nav>
        <a href="#" class="link">google</a>
        <a href="#" class="link">facebook</a>
        <a href="#" class="link">youtube</a>
    </nav>

  CSS:

	nav {
        width: 30em;
        margin: 10em auto;
    }
    
    .link {
        display: inline-block;
        padding: 0 1em;
        height: 2em;
        line-height: 2em;
        text-align: center;
        text-decoration: none;
        color: #fff;
        background-color: #60b3b3;
    }

####显示效果如下：

![Alt text](/Uploads/20161118/582eb41c9f513.png "Optional title")

####原因分析
html编辑时代换行符导致了该bug
####解决办法
第一种方法：清除元素间的换行符

	<nav>
        <a href="#" class="link">google</a><a href="#" class="link">facebook</a><a href="#" class="link">youtube</a>
    </nav>

或者：

	<nav>
        <a href="#" class="link">google</a
        ><a href="#" class="link">facebook</a
        ><a href="#" class="link">youtube</a>
    </nav>
或者：

	<nav>
        <a href="#" class="link">google</a>
        <!--
        --><a href="#" class="link">facebook</a>
        <!--
        --><a href="#" class="link">youtube</a>
    </nav>
显示效果：

![Alt text](/Uploads/20161118/582eb7981ea8a.png "Optional title")

第二种方法：margin负值
	
  html
	
	<nav>
        <a href="#" class="link">google</a>
        <a href="#" class="link">facebook</a>
        <a href="#" class="link">youtube</a>
    </nav>
    
  css

	nav {
        width: 30em;
        margin: 10em auto;
    }
    
    .link {
        display: inline-block;
        padding: 0 1em;
        height: 2em;
        line-height: 2em;
        text-align: center;
        text-decoration: none;
        color: #fff;
        background-color: #60b3b3;
        margin-right: -4px;
    }

显示效果：

![Alt text](/Uploads/20161118/582eb7981ea8a.png "Optional title")

第三种方法：font-size:0  <mark>如果你的单位是使用em,这种方法就不可取了，但是rem就不受影响，可以放心使用。另外这个方法在android的低版本浏览器中不生效。</mark>

  html
  
  	<nav class="zero_size">
        <a href="#" class="link">google</a>
        <a href="#" class="link">facebook</a>
        <a href="#" class="link">youtube</a>
    </nav>
    
  
  css
 	
 	nav {
        width: 480px;
        margin: 160px auto;
    }
    
    .zero_size {
        font-size: 0;
    }
    
    .link {
        display: inline-block;
        padding: 0 10px;
        height: 32px;
        line-height: 32px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        color: #fff;
        background-color: #60b3b3;
    }
  
第四种方法：如果可以使用flexbox布局 <mark>（兼容性问题）</mark>
  
  html
  	
	<nav class="flexbox">
        <a href="#" class="link">google</a>
        <a href="#" class="link">facebook</a>
        <a href="#" class="link">youtube</a>
    </nav>
  
  css
  
	nav {
            width: 30em;
            margin: 10em auto;
        }
        
        .flexbox {
            display: -webkit-box;
            /* safari 3.1-6 */
            display: -moz-box;
            /* firefox 19- */
            display: -ms-flexbox;
            /* ie */
            display: -webkit-flex;
            /* chrome */
            display: flex;
        }
        
        .link {
            display: inline-block;
            padding: 0 1em;
            height: 2em;
            line-height: 2em;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #60b3b3;
            margin-right: -4px;
        }

第五种方法：浮动：float, 设置浮动后，其实就不需要inline－block了，此时元素已经具有layout属性且显示在同一列。    <mark>注意：子元素浮动后会导致父元素高度坍塌。</mark>
  
  css
  
	nav {
        width: 30em;
        margin: 10em auto;
    }
    
    .link {
        float: left;
        padding: 0 1em;
        height: 2em;
        line-height: 2em;
        text-align: center;
        text-decoration: none;
        font-size: 1em;
        color: #fff;
        background-color: #60b3b3;
    }
    
显示效果：

![Alt text](/Uploads/20161118/582eb7981ea8a.png "Optional title")

####总结

<mark>建议：移动端建议使用第四种方法，pc端建议使用第五种方法</mark>

####参考文献

* [www.w3.org](http://www.w3.org/TR/css-style-attr/ 'title')

####其他