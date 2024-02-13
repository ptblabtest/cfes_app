import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';

export default function Guest({ children }) {
    return (
        <div className="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
             style={{ 
                 backgroundImage: "url('https://images.immediate.co.uk/production/volatile/sites/10/2023/06/2048x1365-Oak-trees-SEO-GettyImages-90590330-b6bfe8b.jpg?quality=90&webp=true&resize=1200,800')", 
                 backgroundSize: 'cover', 
                 backgroundPosition: 'center'
             }}>

            <div className="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div className="flex justify-center py-6 mb-7">
                    <Link href="/">
                        <ApplicationLogo className="w-20 h-20 fill-current text-gray-500" />
                    </Link>
                </div>
                {children}
            </div>
        </div>
    );
}
