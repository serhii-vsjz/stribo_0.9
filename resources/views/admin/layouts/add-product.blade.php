<!-- Modal -->

<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addArticleLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addArticleLabel">Добавление продукта</h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" id="title">
                </div>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="text">Текст</label>
                    <textarea class="form-control" id="text"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" id="save" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>



