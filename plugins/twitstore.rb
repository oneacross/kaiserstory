#!/usr/bin/env ruby

require 'mysql'
require 'json'

conn = Mysql.new('localhost', 'root', 'kaiser', 'kaiser')

# convert the json text into a table text for mysql
dirname = 'twitraw'

Dir.foreach(dirname) do |filename|
    next if filename =~ /^[.]/

    File.open("#{dirname}/#{filename}").each do |line|
        begin
            tweet = JSON.load(line)
        rescue JSON::ParserError
            # ignore lines that are not legel JSON
            next
        end

        media = 'twitter'
        text = conn.quote(tweet['text'])

        location = ''
        if !tweet['location'].nil?
            location = conn.quote(tweet['location'])
        end

        if text =~ /obama/
            kw = 'obama'
        elsif text =~ /bachmann/
            kw = 'bachmann'
        end

        # newssource newsdate content location politician_name
        conn.query("insert into media (newssource, newsdate, content, location, politician_name) " +
                   "values (\"#{media}\", \"April 2011\", \"#{text}\", \"#{location}\", \"#{kw}\")")
    end
end

# TODO, loading a file will be faster
#stmt = "LOAD DATA LOCAL INFILE \"\" INTO TABLE kaiser"

conn.close()
