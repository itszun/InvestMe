$(document).ready(function(){
    var ct = $('#contract')
    var tf = $('#cart')
    var add = $('button.add')
    var cls = $('button.remove')
    var cnt = $('#count')
    var total = 0;

    function addentry(){
        let id = this.id
        let row = $('#contract tr#row'+this.id).find("td")
        let data = {
            id: row.eq(0).text(),
            prt: row.eq(1).text(),
            fnd: row.eq(2).text(),
            shr: row.eq(3).text()
        }
        tf.append("<tr id='row"+data.id+"'><td>"+data.id+"</td><td>"+data.prt+"</td><td>"+data.fnd+"</td><td>"+data.shr+"</td><td><button type='button' class='btn btn-danger btn-sm remove' id='"+data.id+"'>x</button></td></tr>")
        row.fadeOut(100, function(){
            row.remove()
        })
        $('button#'+id+".remove").click(rmventry)
        total+= parseInt(data.fnd)
        cnt.text(total)
    }

    function rmventry(){
        let id = this.id
        let row = $('#cart tr#row'+this.id).find("td")
        let data = {
            id: row.eq(0).text(),
            prt: row.eq(1).text(),
            fnd: row.eq(2).text(),
            shr: row.eq(3).text()
        }
        console.log(data)
        console.log('remove_entry')
        ct.append("<tr id='row"+data.id+"'><td>"+data.id+"</td><td>"+data.prt+"</td><td>"+data.fnd+"</td><td>"+data.shr+"</td><td><button type='button' class='btn btn-primary btn-sm add' id='"+data.id+"'>+</button></td></tr>")
        row.fadeOut(100, function(){
             row.remove()
        })

        $('button#'+id+".add").click(addentry)
        total-= parseInt(data.fnd)
        cnt.text(total)
    }
    cnt.text(total)

    add.click(addentry)
    cls.click(rmventry)
})