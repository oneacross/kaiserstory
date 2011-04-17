#!/usr/bin/env ruby

require 'mysql'
<<<<<<< HEAD
require 'json'

conn = Mysql.new('localhost', 'mmendell', 'kaiser', 'kaiser')

# convert the json text into a table text for mysql
filename = 'twitraw/Apr_16_2011_12_29_48.txt'
kw = "obama"

File.open(filename).each { |line|
    begin
        tweet = JSON.load(line)
    rescue JSON::ParserError
        # ignore lines that are not legel JSON
        next
    end

    media = 'twitter'
    text = conn.quote(tweet['text'])
    location = conn.quote(tweet['location'])

    # newssource newsdate content location politician_name
    conn.query("insert into media (newssource, newsdate, content, location, politician_name) " +
               "values (\"#{media}\", \"April 2011\", \"#{text}\", \"#{location}\", \"#{kw}\")")
}

# TODO, loading a file will be faster
#stmt = "LOAD DATA LOCAL INFILE \"\" INTO TABLE kaiser"

conn.close()
=======

conn = Mysql.new('localhost', 'mmendell', 'kaiser')
>>>>>>> mergy
