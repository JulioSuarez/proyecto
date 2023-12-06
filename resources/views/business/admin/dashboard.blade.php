<x-app-layout>
    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @endpush
    <div class="p-4">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Usuario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha de Facturacion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Monto Total Pagado
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                        Price
                    </th> --}}
                        {{-- <th scope="col" class="px-6 py-3">
                            Action
                        </th> --}}
                    </tr>
                </thead>
                <tbody>

                    @forelse ($clientes as $cliente)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{ $cliente['name'] }}
                                <p class="text-sm">{{ $cliente['email'] }}</p>
                            </td>
                            <td class="px-6 py-4">
                                {{ $cliente['invoice_data'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $cliente['invoice_total'] }}
                            </td>
                        </tr>
                    @empty
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            {{-- <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td> --}}
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    <div class="p-4">

        <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between">
                <div>
                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">{{ $total }}
                        $us.
                    </h5>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">Ingresos totales</p>
                </div>
                <div
                    class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                    {{ count($clientes) }}
                    <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13V1m0 0L1 5m4-4 4 4" />
                    </svg>
                </div>
            </div>
            <div id="area-chart"></div>
        </div>
    </div>

    <script>
        var fechas = @json($fechas);
        var ingresos = @json($ingresos);
        console.log(fechas);
        console.log(ingresos);
        // ApexCharts options and config
        window.addEventListener("load", function() {
            let options = {
                chart: {
                    height: "100%",
                    maxWidth: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.55,
                        opacityTo: 0,
                        shade: "#1C64F2",
                        gradientToColors: ["#1C64F2"],
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 6,
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: 0
                    },
                },
                series: [{
                    name: "New users",
                    data: ingresos,
                    color: "#1A56DB",
                }, ],
                xaxis: {
                    categories: fechas,
                    labels: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                },
            }

            if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("area-chart"), options);
                chart.render();
            }
        });
    </script>

</x-app-layout>
