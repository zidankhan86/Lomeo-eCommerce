<!-- order History start -->
<section>
    <div class="container">
        <div class="shopping-cart-wrapper pt-10 pb-20 flex items-start gap-6">
            <!-- shopping cart start -->
            <div class="shopping-cart w-full">
                <div class="px-6 py-6 overflow-x-auto">
                    <table class="min-w-[1270px] w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[160px]">
                                    Order
                                </th>
                                <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[200px]">
                                    Date
                                </th>
                                <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[160px]">
                                    Total Product
                                </th>
                                <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[140px]">
                                    Toral price
                                </th>
                                <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[120px]">
                                    Status
                                </th>
                                <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[120px]">
                                    Details
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($orderHistory as $item)


                            <tr>
                                <td class="py-6 text-sm">
                                    <span class="text-dark-accent stext-[14px] font-display leading-[120%] ">{{ $item->id }}</span>
                                </td>
                                <td class="py-6 text-sm">
                                    <p class="mb-0">{{ $item->created_at instanceof \Carbon\Carbon ? $item->created_at->format('D M Y') : '' }}</p>
                                </td>

                                <td class="py-6 text-sm">
                                    <p>05</p>
                                </td>
                                <td class="py-6 text-sm">
                                    <p>BDT {{ $item->amount }}</p>
                                </td>
                                <td class="py-6 text-sm">
                                    <button class="btn-warning px-3 py-2 text-[#F5813F] text-[14px] leading-[120%] font-display">{{ $item->status }}</button>
                                </td>

                                <td>
                                    <a href="{{ route('order.details',$item->id) }}" class=" text-[#272343] px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                                        Details
                                    </a>
                                </td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- order History end -->
