const sidebarConfig = [
    {
        title: "Dashboard",
        icon: "search",
        items: [
            { name: "Dashboard Monitoring", route: "/dashboard" },
            { name: "Dashboard Peta Pengelolaan Hutan", route: "/dashboard2" },
        ],
    },
    {
        title: "Dana PES",
        icon: "search",
        items: [],
    },
    {
        title: "Pengelolaan Hutan",
        icon: "search",
        items: [
            { name: "Temuan Satwa", route: "/f/animalfindings" },
            { name: "Temuan Tumbuhan", route: "/f/plantfindings" },
            { name: "Temuan HHBK", route: "/f/nontimberfindings" },
            {
                name: "Temuan Penebangan Pohon",
                route: "/f/treeloggingfindings",
            },
            { name: "Temuan Pemanfaatan Lahan", route: "/f/landusefindings" },
            { name: "Temuan Perburuan", route: "/f/huntingfindings" },
            { name: "Patok Batas", route: "/f/boundaryfindings" },
            { name: "Satwa", route: "/animals" },
            { name: "Tumbuhan", route: "/plants" },
        ],
    },
    {
        title: "Pemberdayaan Ekonomi",
        icon: "done",
        items: [
            { name: "List KUPS", route: "/entlists" },
            { name: "Produk KUPS", route: "/entproducts" },
        ],
    },
    {
        title: "Kelembagaan LPHD / KPHA",
        icon: "done",
        items: [
            { name: "List LPHD / KPHA", route: "/orgs" },
            { name: "Data Pengurus", route: "/orgmembers" },
        ],
    },
    {
        title: "Operasional",
        icon: "done",
        items: [
            { name: "Project", route: "/p/projects" },
            { name: "Kelengkapan Dokumen ISO Tahun 1", route: "/p/docs" },
            { name: "Kelengkapan Dokumen ISO Tahun 2", route: "/p/ndocs" },
            { name: "TOR/BTOR", route: "/p/plans" },
            { name: "Import Data Smart", route: "/import" },
        ],
    },
    {
        title: "Lain - lain",
        icon: "done",
        items: [
            { name: "Lokasi", route: "/locations" },
            { name: "Client", route: "/clients" },
        ],
    },
    {
        title: "Admin Setting",
        icon: "done",
        items: [],
    },
];

export default sidebarConfig;
