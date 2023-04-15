import { Link } from "@inertiajs/react"

export default function Pagination({ data }) {

    return     <div className="flex gap-8">

    { data.links.map((link, i) => {

        if (i <= 5 || //the first five pages
            i == data.last_page || //the last page
            Math.abs(data.current_page - i) <= 1 //the current page and the one before and after
            ) {
                return  <Link href={link.url} className={link.active ? "text-success" : ''} preserveScroll preserveState dangerouslySetInnerHTML={{__html: link.label}}></Link>
            }

        if(i > data.last_page) {
            return <Link href={link.url} preserveScroll preserveState dangerouslySetInnerHTML={{__html: link.label}}></Link>
        }


    })}

</div>
}
