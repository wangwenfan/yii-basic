#### 使用用Yii2.0框架做的一个博客。
> 使用composer安装
* 安装程序包和相关插件
* config配置
* Restful Api
* gii生成代码
> 用户登录
* 记住密码
* 密码生成和验证
> 模型操作
* 模型验证规则 rules
* activeRecord Model 使用
* 关联查询 hasOne hasMany
> 控制器
* behaviors 运用
> 视图
* layout
* activeForm
* 图片上传
* 分页
* Assets资源包管理
* markdown `<?= Markdowneditor::widget(['model' => $model, 'attribute' => 'content']) ?>

* redactor编辑器 
```     <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(), [
               'clientOptions' => [
                   'imageManagerJson' => ['/redactor/upload/image-json'],
                   'lang' => 'zh_cn',
                   'minHeight' => '300px',
               ]
           ]) ?>
  ```
  * 修改 fileinput插件，改装成全局图片上传组件。



