@section('scripts')
<script src="/js/jquery-ui.js"></script>
<script src="/js/moment.js"></script>
<script src="/js/bootstrap-notify.min.js"></script>  
<script src="/js/profilejquery.js"></script>  
<script>notification('{{session("insert")}}', '{{session("type")}}');</script>
<script src="/js/datepicker/datepickerConfig.js"></script> 
<script src="/js/buscadorCP.js" charset="utf-8"></script>
<script src="/js/dragDrop.js"></script>
<script src="/js/angular.min.js"></script>
<script src="/js/kendo.all.min.js"></script>
<script src="/js/Curriculum/cycles.js"></script>
<script src="/js/Curriculum/experiences.js"></script>
<script src="/js/Curriculum/language.js"></script>
<script src="/js/Curriculum/license.js"></script>
<script src="/js/Curriculum/certifications.js"></script>
<script src="/js/Curriculum/otherGrades.js"></script>
<script src="/js/Curriculum/aptitude.js"></script>
<script src="/js/Curriculum/CV.js"></script>
<script src="/js/Curriculum/site.js"></script>
@endsection
