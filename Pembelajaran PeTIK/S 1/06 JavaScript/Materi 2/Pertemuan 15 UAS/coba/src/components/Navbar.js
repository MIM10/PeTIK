import React from 'react';
import { useRef } from 'react';
import {FaBars, FaTimes} from "react-icons/fa"
import logo from "../img/logo.png";

const Navbar = () => {
    const navRef = useRef()

    const showNavbar = () => {
        navRef.current.classList.toggle("responsive_nav")
    }

    return (
        <header>
            <div className='bag-1'>
                <img src={logo} className='logo'></img>
                <h3>Half Games</h3>
            </div>
            <nav ref={navRef}>
                <a className='' href='/#'>Home</a>
                <a className='' href='/#'>Categories</a>
                <a className='' href='/#'>Best Selling</a>
                <a className='' href='/#'>New Arival</a>
                <a className='' href='/#'>About</a>
                <button className='nav-btn nav-close-btn' onClick={showNavbar}>
                    <FaTimes/>
                </button>
            </nav>
            <button className='nav-btn' onClick={showNavbar}>
                <FaBars/>
            </button>
        </header>
    );
}

export default Navbar;
