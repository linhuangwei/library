//用来获取传来的名字
var url = require('url');
var querystring = require('querystring');
var mysql = require('mysql');
var http = require('http');

//获取数据库的我的收藏
http.createServer(function (req, res) {
    //解决跨越
    res.setHeader('Access-Control-Allow-Origin', '*');
    //设置响应头
    res.writeHead(200, { 'Content-type': 'text/plain;charset=utf-8' });
    //创建连接池

    //在这里输入url地址,从url地址获取name
    var urlPath = url.parse(req.url).query;
    // 解析字符串
    var urlJson = querystring.parse(urlPath);
    // res.end(urlJson.pubHouse);
    var pubId = null;
    var bId = null;

    var pool = mysql.createPool({
        'host': 'localhost',
        'user': 'root',
        'password': '123456',
        'database': 'sanyou'
    });
   
    //连接数据库
    pool.getConnection(function (err, connect) {
        if (err) {
            console.log('连接失败')
        } else {
            // console.log('连接成功');
            // console.log(name);
            var sql = 'select pubId from pubHouse where pubName ="'+urlJson.pubHouse+'";';
            var optionArr = [urlJson.pubHouse];
            connect.query(sql, optionArr, function (err, data) {
                if (err) {
                    console.log('错误类型：' + err);
                } else {
                    if (data.length != 0) {
                        // console.log(data.length);
                        //获取出版社名称
                        pubId = JSON.stringify(data[0].pubId);
                        // console.log(json);
                        // var i =data;
                        // console.log(pubId);
                        // res.end(pubId);
                        // 此时我们已经获取了出版社的ID，只需要再获取bookType的id
                         // console.log('连接成功');
            // console.log(name);
            var sql1 = 'select bId from bookType where bName ="'+urlJson.bookType+'";';
            var optionArr1 = [urlJson.pubHouse];
            connect.query(sql1, optionArr1, function (err, data) {
                if (err) {
                    console.log('错误类型：' + err);
                } else {
                    if (data.length != 0) {
                        // console.log(data.length);
                        //获取出版社名称
                        bId = JSON.stringify(data[0].bId);
                        // console.log(json);
                        // var i =data;
                        // console.log(bId);
                        // res.end(bId);
 //这是检验是否存在一样的书的                     
 var sql3 = 'select * from book where bookName = "'+urlJson.bookName+'" and ISBN = '+urlJson.ISBN+';';
 var optionArr3 = [];
            connect.query(sql3, optionArr3, function (err, data3) {
                if (err) {
                    console.log('错误类型：' + err);
                } else {
                    if(data3.length != 0){
                        res.end('书库已经存在这本书');
                    }else
                    {
 //这是增加的                      
 var sql2 = 'insert into book(bookName,ISBN,pubHouse,bookType,bookStatus,bookPrice,bookNum) value("'+urlJson.bookName+'",'+urlJson.ISBN+','+pubId+','+bId+','+"1"+','+urlJson.bookPrice+','+urlJson.bookNum+');';
 var optionArr2 = [];
            connect.query(sql2, optionArr2, function (err, data) {
                if (err) {
                    console.log('错误类型：' + err);
                } else {
                  res.end("增加成功");
                }
            })//这是增加的
                    }
                }
            })//这是检查的
                        
                    } else {
                        location.replace();
                        res.end("书屋没有导入这个图书类型");
                    }
                }
            })//这是查询图书类型id的
                    } else {
                        res.end("书屋没有导入这个出版社");
                    }
                }
            })//这是查询出版社id的
        }
    })

}).listen(5555);