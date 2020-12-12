// kejarbahasa_team

const sort = document.getElementById("sort");
const clear = document.getElementById("clear");

sort.addEventListener('change', filterResults);
clear.addEventListener("click", function(){
    document.location.href="/class";
});

$(document).ready(function(){
    if ($('#keyword').val()=="") {
        $('#x-btn').hide();
    }else{
        $('#x-btn').click(function(){
            $('#keyword').val("");
            $('#x-btn').hide();
            if ($(this).val() == "") {
                $('#list-tab').html('');
            }
        });
    }

    $('#keyword').keyup(function(e){
        $('#x-btn').show();
        
        if ($('#keyword').val()=="") {
            $('#x-btn').hide();
        }else{
            $('#x-btn').show();
            $('#x-btn').click(function(){
                $('#keyword').val("");
                $('#x-btn').hide();
                if ($(this).val() == "") {
                    $('#list-tab').html('');
                }
            });
        }
        

        $.ajax({
            type: "GET",
            url: "/class/search/class",
            data: {
                '_token': $('input[name="_token"]').val(),
                'keyword': $(e.currentTarget).val()
            },
            dataType: "JSON",
            success: function (response) {
                $('#list-tab').html('');
                if ($('#keyword').val() == '') {
                    $('#classSearchList').addClass('d-none');
                } else {
                    $('#classSearchList').removeClass('d-none');
                    for (let index = 0; index < response.length; index++) {
                        const element = response[index];
                        let category = response[index].category;
                            title = response[index].name;
                            image = response[index].picture;
                            harga = response[index].price;
                            link = response[index].link;

                        let number_string = harga.toString(),
                            split = number_string.split(),
                            sisa = split[0].length % 3,
                            price = split[0].substr(0, sisa),
                            ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);
                        
                        if (ribuan) {
                            separator = sisa ? '.' : '';
                            price += separator + ribuan.join(',');
                        }

                        if (price == 0) {
                            price = 'Free';
                        } else {
                            price = split[1] != undefined ? 'Rp '+price+','+split[1]: 'Rp '+price;
                        }

                        $('#list-tab').append(`
                            <a href="${link}" class="list-group-item list-group-item-action"
                                    id="list-home-list" role="tab" aria-controls="home">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="../images/class/${image}" width="60px">
                                    </div>
                                    <div class="col-md-8">
                                        ${title} <br>
                                        ${price}
                                    </div>
                                </div>
                            </a>
                        `);
                    }
                }
            }
        });

    });

    $('.collapseData').on('show.bs.collapse', function(e){
        $(e.relatedTarget).children('i').removeClass('fa-angle-right');
        $(e.relatedTarget).children('i').addClass('fa-angle-down');
    });
    
    $('#keyword').keydown(function(e){
        if (e.keyCode == 13) {
            e.preventDefault();
            return filterResults();
        }
    });
});

function getIds(checkboxName){
    let checkBoxes = document.getElementsByName(checkboxName);
    let ids = Array.prototype.slice.call(checkBoxes)
                    .filter(ch => ch.checked == true).map(ch => ch.value);

    return ids;
}

function getSelect(idnya){
    let selectbox = document.getElementById(idnya);
    let ids = Array.prototype.slice.call(selectbox)
                    .filter(ch => ch.selected == true).map(ch => ch.value);
    return ids;
}

function getInput(namenya){
    let input = document.getElementsByName(namenya);
    let ids = Array.prototype.slice.call(input).map(ch => ch.value);

    return ids
}

function filterResults(){
    let type = getIds("type");
    let categoryIds = getIds("category");
    let keyword = getInput("keyword");
    let sort = getSelect("sort");
    let href = 'class?';

    if (type != '') {
        href += `type=${type}`;
    }
    if (categoryIds != '') {
        if (type == '') {
            href += `filter[category]=${categoryIds}`;
        }else{
            href += `&filter[category]=${categoryIds}`;
        }
    }

    if (keyword != '') {
        if (categoryIds == '') {
            if (type != '') {
                href += `&keyword=${keyword}`;
            }else{
                href += `keyword=${keyword}`;
            }
        } else {
            href += `&keyword=${keyword}`;
        }
    }

    if (sort != '') {
        if (keyword == '') {
            if (categoryIds != '') {
                    href += `&sort=${sort}`;
            } else if (type != '') {
                href += `&sort=${sort}`;
            } else{
                href += `sort=${sort}`;
            }
        }else{
            href += `&sort=${sort}`;
        }
    }

    if (categoryIds=='' && type=='' && keyword=='' && sort =='') {
        document.location.href = '/class';
    }else{
        document.location.href = href;
    }
}