--
-- PostgreSQL database dump
--

-- Dumped from database version 12.7 (Ubuntu 12.7-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.7 (Ubuntu 12.7-0ubuntu0.20.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: core; Type: SCHEMA; Schema: -; Owner: michael
--

CREATE SCHEMA core;


ALTER SCHEMA core OWNER TO michael;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: alert; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.alert (
    alert_id integer NOT NULL,
    alert_source character varying(80),
    alert_url character varying(80),
    alert_title character varying(80)
);


ALTER TABLE core.alert OWNER TO michael;

--
-- Name: channel; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.channel (
    channel_id integer NOT NULL,
    channel_tag character varying(80),
    channel_description character varying(80)
);


ALTER TABLE core.channel OWNER TO michael;

--
-- Name: dataset; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.dataset (
    dataset_id character varying(80) NOT NULL,
    dataset_name character varying(80),
    dataset_description character varying(80),
    publication_id integer NOT NULL,
    publication_publication_id character varying(80) NOT NULL
);


ALTER TABLE core.dataset OWNER TO michael;

--
-- Name: edition; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.edition (
    item_id character varying(80) NOT NULL,
    edition_name character varying(80) NOT NULL,
    edition_tablespace character varying(80) NOT NULL,
    edition_source character varying(80) NOT NULL,
    edition_id integer NOT NULL,
    vintage_vintage_id character varying(80) NOT NULL,
    dataset_dataset_id character varying(80) NOT NULL
);


ALTER TABLE core.edition OWNER TO michael;

--
-- Name: member; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.member (
    member_id integer NOT NULL,
    member_email character varying(80),
    member_name character varying(80),
    member_password character varying(80),
    member_validation character varying(16),
    member_validated character varying(1),
    member_enabled character varying(1),
    member_created date,
    member_notes character varying(80)
);


ALTER TABLE core.member OWNER TO michael;

--
-- Name: model; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.model (
    model_id character varying(80) NOT NULL,
    model_description character varying(256)
);


ALTER TABLE core.model OWNER TO michael;

--
-- Name: page; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.page (
    page_id character varying(80) NOT NULL,
    page_title character varying(80)
);


ALTER TABLE core.page OWNER TO michael;

--
-- Name: publication; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.publication (
    publication_id character varying(80) NOT NULL,
    publication_name character varying(80) NOT NULL,
    publication_description character varying(80) NOT NULL,
    publication_url character varying(80),
    publisher_publisher_id character varying(80) NOT NULL
);


ALTER TABLE core.publication OWNER TO michael;

--
-- Name: publisher; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.publisher (
    publisher_id character varying(80) NOT NULL,
    publisher_name character varying(80) NOT NULL,
    publisher_description character varying(256) NOT NULL,
    publisher_image character varying(80),
    publisher_notice character varying(80)
);


ALTER TABLE core.publisher OWNER TO michael;

--
-- Name: session; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.session (
    session_id integer NOT NULL,
    session_start date,
    member_member_id integer NOT NULL
);


ALTER TABLE core.session OWNER TO michael;

--
-- Name: sub_pub; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.sub_pub (
    sub_pub_id integer NOT NULL,
    publication_id integer,
    subject_id integer
);


ALTER TABLE core.sub_pub OWNER TO michael;

--
-- Name: subject; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.subject (
    subject_id character varying(80) NOT NULL,
    subject_name character varying(80),
    subject_description character varying(80)
);


ALTER TABLE core.subject OWNER TO michael;

--
-- Name: subscription; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.subscription (
    id integer NOT NULL,
    option character varying(1),
    member_member_id integer NOT NULL
);


ALTER TABLE core.subscription OWNER TO michael;

--
-- Name: vintage; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.vintage (
    vintage_id character varying(80) NOT NULL,
    vintage_description character varying(80) NOT NULL,
    vintage_date date
);


ALTER TABLE core.vintage OWNER TO michael;

--
-- Data for Name: alert; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.alert (alert_id, alert_source, alert_url, alert_title) FROM stdin;
\.


--
-- Data for Name: channel; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.channel (channel_id, channel_tag, channel_description) FROM stdin;
\.


--
-- Data for Name: dataset; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.dataset (dataset_id, dataset_name, dataset_description, publication_id, publication_publication_id) FROM stdin;
\.


--
-- Data for Name: edition; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.edition (item_id, edition_name, edition_tablespace, edition_source, edition_id, vintage_vintage_id, dataset_dataset_id) FROM stdin;
\.


--
-- Data for Name: member; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.member (member_id, member_email, member_name, member_password, member_validation, member_validated, member_enabled, member_created, member_notes) FROM stdin;
1	michael.bryan@openenvironments.com	michael	asd	516LF2KDG3J2CG47	N	N	2021-10-23	
\.


--
-- Data for Name: model; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.model (model_id, model_description) FROM stdin;
geocode	The OE Geocoding service provides, for each address requested, the various geography definitions including state, county, census tract, school district.  These added traits can be used to relate addresses to public data published along these dimensions.
append	The OE Append service provides, for each geography requested, the many properties published by public agencies including race, age, family structure, education, income, etc.
predictor	The OE Predictor model learns from an input dataset that has true/false labels. The custom model that results combines modern machine learning algorithms into an ensemble model that can be implemented by the OE member.
\.


--
-- Data for Name: page; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.page (page_id, page_title) FROM stdin;
about.php	Open Environments - About Us
cart.php	Open Environments - Shopping Cart
contact.php	Open Environments - Contact Us
cookies-policy.php	Open Environments - Cookies Policy
help.php	Open Environments - Help
index.php	Open Environments
models.php	Open Environments - Models
notifications.php	Open Environments - Notifications
privacy-policy.php	Open Environments - Privacy Policy
profile.php	Open Environments - Profile
publications.php	Open Environments - Publications
publishers.php	Open Environments - Publishers
settings.php	Open Environments - Settings
subjects.php	Open Environments - Subjects
terms.php	Open Environments - Terms of Service
\.


--
-- Data for Name: publication; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.publication (publication_id, publication_name, publication_description, publication_url, publisher_publisher_id) FROM stdin;
Decennial	Decennial Census		https://www.census.gov/programs-surveys/decennial-census.html	census
ACS	American Community Survey		https://www.census.gov/programs-surveys/acs	census
TIGER	Topologically Integrated Geographic Encoding and Referencing		https://www.census.gov/geographies/mapping-files	census
FIPS	Federal Information Processing Series		https://www.census.gov/library/reference/code-lists/ansi.html	nist
EROTP	Economic Report of the President		https://www.whitehouse.gov/cea/economic-report-of-the-president/	bea
SRD	Standard Reference Data		https://www.nist.gov/srd	nist
NAICS	North American Industry Classification System codes		https://www.census.gov/library/reference/code-lists/ansi.html	nist
GNIS	Domestic Names		https://www.usgs.gov/core-science-systems/ngp/board-on-geographic-names	usgs
FRED	Federal Reserve Economic Data		https://fred.stlouisfed.org/	federalreserve
NOWData	NOAA Online Weather Data		https://www.weather.gov/climateservices/nowdatafaq	nws
AIS	Address Information System Viewer		https://postalpro.usps.com/address-quality/ais-viewer	usps
PatEx	Patent Examination Research Dataset 		https://bulkdata.uspto.gov/data/patent/pair/economics/2020/	uspto
PEDS	Patent Examination Data System		https://ped.uspto.gov/peds/#!/	uspto
\.


--
-- Data for Name: publisher; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.publisher (publisher_id, publisher_name, publisher_description, publisher_image, publisher_notice) FROM stdin;
bea	Bureau of Economic Analysis	The BEA is administered by the White House rather than any one Department.  It publishes official macroeconomic and industry statistics as well as the National Income and Products Accounts (NIPAs)	whitehouse.png	
census	US Census Bureau	The Census Bureau resides in the Department of Commerce.  It is required by the U.S. constitution to count population to determine congressional seats.	census.png	This uses the Census Data API but is not endorsed by the Census Bureau.
federalreserve	US Federal Reserve System	Accountable directly to congress, the Federal Reserve administers a system of 12 regional banks printing U.S. currency and setting federal interest rates that guide the market.	federalreserve.png	
nist	National Institues of Science & Technology	Technically, NIST is a non-regulatory agency within the US Department of Commerce.  It maintains technology standards.	nist.png	
nws	National Weather Service	The Weather Service uses the other atmospheric measures to forecast weather primarily for public safety and general information.	nws.png	
usgs	US Geological Survey	The Geological Survey studies the US topologically, including its biology, geography, geology, and hydrology.	usgs.png	
usps	US Postal Service	The Postal Service is an independent agency of the executive branch tasked with mail delivery.  As a consequence, it maintains primary data on US addresses, streets and roads.	usps.png	
uspto	US Patent & Trademark Office	The Patent  & Trademark Office administers the US Federal Registry of intellectual property.  This include processing applications for new claims as well as maintenance of the existing registry.	uspto.jpg	
\.


--
-- Data for Name: session; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.session (session_id, session_start, member_member_id) FROM stdin;
1	2021-10-15	8
2	2021-10-15	9
3	2021-10-15	10
4	2021-10-15	11
\.


--
-- Data for Name: sub_pub; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.sub_pub (sub_pub_id, publication_id, subject_id) FROM stdin;
\.


--
-- Data for Name: subject; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.subject (subject_id, subject_name, subject_description) FROM stdin;
\.


--
-- Data for Name: subscription; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.subscription (id, option, member_member_id) FROM stdin;
\.


--
-- Data for Name: vintage; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.vintage (vintage_id, vintage_description, vintage_date) FROM stdin;
\.


--
-- Name: alert alert_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.alert
    ADD CONSTRAINT alert_pk PRIMARY KEY (alert_id);


--
-- Name: channel channel_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.channel
    ADD CONSTRAINT channel_pk PRIMARY KEY (channel_id);


--
-- Name: dataset dataset_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.dataset
    ADD CONSTRAINT dataset_pk PRIMARY KEY (dataset_id);


--
-- Name: edition item_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.edition
    ADD CONSTRAINT item_pk PRIMARY KEY (item_id);


--
-- Name: member member_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.member
    ADD CONSTRAINT member_pk PRIMARY KEY (member_id);


--
-- Name: page page_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.page
    ADD CONSTRAINT page_pk PRIMARY KEY (page_id);


--
-- Name: publication publication_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.publication
    ADD CONSTRAINT publication_pk PRIMARY KEY (publication_id);


--
-- Name: publisher publisher_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.publisher
    ADD CONSTRAINT publisher_pk PRIMARY KEY (publisher_id);


--
-- Name: session session_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.session
    ADD CONSTRAINT session_pk PRIMARY KEY (session_id);


--
-- Name: sub_pub sub_pub_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.sub_pub
    ADD CONSTRAINT sub_pub_pk PRIMARY KEY (sub_pub_id);


--
-- Name: subject subject_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.subject
    ADD CONSTRAINT subject_pk PRIMARY KEY (subject_id);


--
-- Name: subscription subscription_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.subscription
    ADD CONSTRAINT subscription_pk PRIMARY KEY (id);


--
-- Name: vintage vintage_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.vintage
    ADD CONSTRAINT vintage_pk PRIMARY KEY (vintage_id);


--
-- Name: dataset dataset_publication_fk; Type: FK CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.dataset
    ADD CONSTRAINT dataset_publication_fk FOREIGN KEY (publication_publication_id) REFERENCES core.publication(publication_id);


--
-- Name: edition edition_dataset_fk; Type: FK CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.edition
    ADD CONSTRAINT edition_dataset_fk FOREIGN KEY (dataset_dataset_id) REFERENCES core.dataset(dataset_id);


--
-- Name: edition edition_vintage_fk; Type: FK CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.edition
    ADD CONSTRAINT edition_vintage_fk FOREIGN KEY (vintage_vintage_id) REFERENCES core.vintage(vintage_id);


--
-- Name: publication publication_publisher_fk; Type: FK CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.publication
    ADD CONSTRAINT publication_publisher_fk FOREIGN KEY (publisher_publisher_id) REFERENCES core.publisher(publisher_id);


--
-- PostgreSQL database dump complete
--

