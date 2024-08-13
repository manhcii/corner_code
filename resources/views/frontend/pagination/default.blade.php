
<div class="products-list-pagination d-flex justify-content-between align-items-center">
    <strong class="pagination-prev" id="prevPage"> Previous </strong>
    <div class="products-list-pagination-page d-flex align-items-center">
        <label for="collections-pagination"> Page: </label>
        <div class="products-list-pagination-select position-relative">
            <select name="pagination" id="collections-pagination">
                @for ($page = 1; $page <= $paginator->lastPage(); $page++)
                    <option value="{{ $page }}" {{ $page == $paginator->currentPage() ? 'selected' : '' }}>
                        {{ $page }}
                    </option>
                @endfor
            </select>
        </div>
        <div class="pagination-total">of {{ $paginator->lastPage() }}</div>
    </div>
    <strong class="pagination-next" id="nextPage"> Next </strong>
</div>
@push('script')
<script>
    $(document).ready(function () {
        // Function to handle page change
        function changePage(selectedPage) {
            var currentUrl = "{{ url()->current() }}";
            var newUrl = currentUrl.replace(/(\?|\&)page=\d+/g, ''); // Remove existing page parameter
            newUrl += (newUrl.includes('?') ? '&' : '?') + 'page=' + selectedPage;
            window.location.href = newUrl;
        }

        // Event listener for select change
        $('#collections-pagination').on('change', function () {
            var selectedPage = $(this).val();
            changePage(selectedPage);
        });

        // Event listener for "Previous" button
        $('#prevPage').on('click', function () {
            var currentPage = parseInt($('#collections-pagination').val());
            if (currentPage > 1) {
                changePage(currentPage - 1);
            }
        });

        // Event listener for "Next" button
        $('#nextPage').on('click', function () {
            var currentPage = parseInt($('#collections-pagination').val());
            var lastPage = {{ $paginator->lastPage() }};
            if (currentPage < lastPage) {
                changePage(currentPage + 1);
            }
        });
    });
</script>
@endpush

